<?php

namespace App\Http\Controllers;

use App\Mail\OrderEmail;
use App\Mail\PriceEmail;
use App\Mail\ClientEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\NavigationController;
use App\Orderlist;
use Cart;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use App\OrderPart;
use App\PriceRequest;
use Illuminate\Support\Facades\Auth;
use App\PaymentDetailsUser;

/*************
 * | Контролер корзины и отправки информации о покупке
 * | fillable для проверки заполняемых полей. Не забывать редактировать если 
 * | название полей в таблице изменяется
 * | 
 * | 1. Get Page Cart (Получение страницы корзины)
 * | 2. Dеlete product from cart (Удаление продукта с временной таблицы корзины)
 * | 3. Checout Page (Получение страницы оформление заказа)
 * | 4. Checkout Post (Отправление информации о покупке на почту клиента и на почту администратора)
 * | 5. Sale Form Post (Отправка формы 'Нашли дешевле' на почту и в базу)

 **************/

class CartController extends Controller
{
    //
    use NavigationController;


    /**
     * | Get Page Cart
     * | Получение страницы корзины
     */
    public function getPage()
    {
        return view('page/cart', [
            'navigations'       =>  $this->navigation(),
            'contacts'          => collect($this->contacts()),
            'cart'              =>  $this->getCartCount(),
            'cartContent'       =>  Cart::content(),
            'user'              =>  Auth::user(),
        ]);
    }

    /**
     * | Dеlete product from cart
     * | Удаление продукта с временной таблицы корзины
     */
    public function destroyProduct($cart_id)
    {
        Cart::remove($cart_id);

        return redirect()->route('cart');
    }

    /**
     * | Checout Page
     * | Получение страницы оформление заказа
     */
    public function checkout()
    {
        if (Auth::user()) {
            $paymentDetail = PaymentDetailsUser::get();
            $paymentDetail = $paymentDetail->where('user_id', Auth::user()->id)->first();
        } else {
            $paymentDetail = Null;
        }



        return view('page/checkout', [
            'navigations'       =>  $this->navigation(),
            'contacts'          => collect($this->contacts()),
            'cart'              =>  $this->getCartCount(),
            'cartContent'       =>  Cart::content(),
            'user'              =>  Auth::user(),
            'paymentDetail'     =>  $paymentDetail,
        ]);
    }

    /**
     * | Checkout Post
     * | Отправление информации о покупке на почту клиента и на почту администратора
     */
    public function checkoutPost(Request $request)
    {

        //
        $checkout = Cart::content();
        $contacts = collect($this->contacts());
        $order = new Orderlist();


        // Проверим контактные данные
        $request->validate([
            'firstname' => 'required|max:255',
            'secondname' => 'required|max:255',
            'addname'   => 'required|max:255',
            'delivery'  => 'numeric',
            'country'    => 'numeric',
            'region'    => 'max:32',
            'autoregion' => 'max:32',
            'district' => 'max:32',
            'city' => 'max:30',
            'address' => 'required',
            'email' => 'required|email'
        ]);

        // Если метод оплаты не выбран вернемся чтобы напомнить
        if (!$request->paymethod)
            return Redirect::back()->withInput($request->input())
                ->with('paymethod', 'Выберете способ оплаты');



        // Занесем данные в $contact для отправки по почтам
        $contact['order_lname'] = $request->secondname;
        $contact['order_fname'] = $request->firstname;
        $contact['order_mname'] = $request->addname;
        $contact['order_country'] = $request->country;
        $contact['order_delivery'] = $request->delivery;
        $contact['order_region'] = $request->region;
        $contact['order_autonomous'] = $request->autoregion;
        $contact['order_district'] = $request->district;
        $contact['order_city'] = $request->city;
        $contact['order_address'] = $request->address;
        $contact['order_index'] = $request->zipcode;
        $contact['order_email'] = $request->email;
        $contact['order_phone'] = $request->tel;
        $contact['order_comment'] = $request->message;
        $contact['paymethod'] = $request->paymethod;

        // Содержимое заказа
        $contact['items'] = [];
        foreach ($checkout as $item) {
            array_push($contact['items'], $item->options->type . ' ' . $item->name  . ' x' . $item->qty . ' ' . $item->subtotal . 'руб');
        }


        // Занесем заказ в таблицу
        $order->order_status = 0;
        $order->order_return = 0;
        $order->order_payment = 0;
        $order->order_lname = $contact['order_lname'];
        $order->order_tracking = '';
        $order->order_fname = $contact['order_fname'];
        $order->order_mname = $contact['order_mname'];
        $order->order_country = $contact['order_country'];
        $order->order_delivery = $contact['order_delivery'];
        $order->order_region = $contact['order_region'];
        $order->order_autonomous = $contact['order_autonomous'];
        $order->order_district = $contact['order_district'];
        $order->order_city = $contact['order_city'];
        $order->order_address = $contact['order_address'];
        $order->order_index = $contact['order_index'];
        $order->order_email = $contact['order_email'];
        $order->order_phone = $contact['order_phone'];
        $order->order_comment = $contact['order_comment'];
        $order->order_timestamp = strtotime(Carbon::now());
        $order->paymethod = $contact['paymethod'];
        $order->save();

        // получим id заказа
        $contact['id'] = $order->id;

        foreach ($checkout as $item) {
            // Занесем содержимое заказа в таблицу
            $orderPart = new OrderPart();
            $orderPart->part_id = $item->id;
            $orderPart->order_status = $order->order_status;
            $orderPart->part_return = $order->order_return;
            $orderPart->part_cancel = 0;
            $orderPart->order_count = $item->qty;
            $orderPart->payment_status = 0;
            $orderPart->order_id = $order->id;
            $orderPart->time = strtotime(Carbon::now());
            $orderPart->save();
        }

        // Sending Mail
        Mail::to($contacts->get('mailMain')->value)->send(new OrderEmail($contact));
        Mail::to($contact['order_email'])->send(new ClientEmail($contact));

        Cart::destroy();

        return redirect()->back()->with('success', 'Поздравляем!')
            ->with('message', 'Ваша покупка удачно оформлена. В скором времени с вами свяжется наш менеджер. А пока проверьте свою почту. Детали заказа уже там!');
    }


    /**
     * Sale Form Post
     * Отправка формы 'Нашли дешевле' на почту и в базу
     */
    public function saleFormPush(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'url'   => 'required|url'
        ]);

        $contact['name'] = $request->name;
        $contact['email'] = $request->email;
        $contact['url'] = $request->url;

        PriceRequest::create([
            'name' => $contact['name'],
            'email' => $contact['email'],
            'url' => $contact['url']
        ]);

        $contacts = collect($this->contacts());

        // Sending Mail
        Mail::to($contacts->get('mailMain')->value)->send(new PriceEmail($contact));

        return redirect()->back()->with('success', 'Ок, мы посмотрим, что можно сделать!')
            ->with('message', 'Ваша заявка удачно оформлена. В скором времени с вами свяжется наш менеджер. Он уточнит цену или предложит альтернативы. Спасибо!');

        // Ваша заявка удачно оформлена. В скором времени с вами свяжется наш менеджер. Он уточнит цену или предложит альтернативы. Спасибо!
    }

    // Проверка количества товара и disable button
    // Посути нужно сделать функцию которая бы сравнивала количество товара 
    // И корзину по id и возвращала сласс dissable для кнопки 
    //   a.disabled {
    //     pointer-events: none;
    //     cursor: default;
    //   }
}

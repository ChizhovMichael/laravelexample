<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\NavigationController;
use Illuminate\Support\Facades\Auth;
use App\PaymentDetailsUser;

/*************
 * | Контролер домашней страницы клиента
 * | 
 * | 1. Show the application dashboard
 * | 2. PaymentDetailsUserPush (Отправка деталей оплаты в таблицу PaymentDetails)
 * | 3. PaymentDetailsUserPush (Удаление деталей оплаты из таблицы PaymentDetails)
 **************/

class HomeController extends Controller
{
    use NavigationController;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $paymentDetail = PaymentDetailsUser::get();
        $paymentDetail = $paymentDetail->where('user_id', Auth::user()->id)->first();

        if(Auth::user()->type == 'admin')
            return redirect('admin');
        

        return view('home', [
            'navigations'       =>  $this->navigation(),
            'contacts'          =>  collect($this->contacts()),
            'cart'              =>  $this->getCartCount(),
            'user'              =>  Auth::user(),
            'paymentDetail'     =>  $paymentDetail,
        ]);
    }


    /**
     * | PaymentDetailsUserPush
     * | Отправка деталей оплаты в таблицу PaymentDetails
     * | @return message
     */
    public function PaymentDetailsUserPush(Request $request)
    {

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

        PaymentDetailsUser::updateOrCreate(
            [
                'user_id' => Auth::user()->id,
            ],
            [
                'name' => $request->firstname,
                'secondname' => $request->secondname,
                'addname' => $request->addname,
                'delivery' => $request->delivery,
                'country' => $request->country,
                'zipcode' => $request->zipcode,
                'region' => $request->region,
                'autonomous' => $request->autoregion,
                'district' => $request->district,
                'city' => $request->city,
                'address' => $request->address,
                'phone' => $request->tel,
                'email' => $request->email,
                'comment' => $request->message
            ]
            );


        return redirect()->back()->with('success', 'Ваши данные обновлены!')
            ->with('message', 'Спасибо, что используете сервис нашего интернет-магазина. Теперь ваши данные будут автоматически высвечивается в разделе оформления заказа.');



    }

    /**
     * | PaymentDetailsUserPush
     * | Удаление деталей оплаты из таблицы PaymentDetails
     * | @return message
     */
    public function PaymentDetailsUserDelete() {

        PaymentDetailsUser::where('user_id', Auth::user()->id)->delete();


        return redirect()->back()->with('success', 'Ваши данные удалены!')
            ->with('message', 'Теперь вы не сможете использовать автоматическую подстановку данных при покупке товара.');
    }
}

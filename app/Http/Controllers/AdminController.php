<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\NavigationController;
use App\Product;
use App\Stock;
use App\Navigation;
use App\NavigationAdditional;
use App\Orderlist;
use App\PartType;
use Carbon\Carbon;
use App\OrderPart;
use App\Sale;
use Illuminate\Support\Facades\Mail;
use App\Mail\CheckedEmail;
use App\Mail\DeleteOrderEmail;

/***************
 * Административный раздел
 * 1. admin (Показывать страницу админстратора только для администратора)
 * 2. productEditContent (Редактирование продуктов для контент менеджера)
 * 3. productUpdateContent (Обновление продуктов для контент менеджера)
 * 4. navigationEdit (Редактирование навигации в административной панеле)
 * 5. navigationEditDeleteSection (Удаление раздела навигации)
 * 6. navigationEditDeleteSubsection (Удаление подраздела навигации)
 * 7. navigationEditSaveSection (Обновление раздела навигации)
 * 8. navigationEditSaveSubsection (Обновление подраздела навигации)
 * 9. navigationEditAddSection (Добавление раздела навигации)
 * 10. navigationEditAddSubsection (Добавление подраздела навигации)
 * 11. contactEdit (Редактирование контактов в административной панеле)
 * 12. contactEditAdd (Добавление контактов в административной панеле)
 * 13. contactEditUpdate (Обновление контактов в административной панеле)
 * 14. contactEditDelete (Удаление контактов в административной панеле)
 * 15. orderEdit (Редактирование заказов в административной панеле)
 * 16. orderEditAll (Редактирование всех заказов в административной панеле)
 * 17. orderEditDeatil (Редактирование отдельного заказов в административной панеле)
 ***********/

class AdminController extends Controller
{
    //
    use NavigationController;

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * admin
     * Показывать страницу админстратора только для администратора
     */
    public function admin()
    {
        return view('admin', [
            'page' => 'main'
        ]);
    }


    /**
     * productEditContent
     * Редактирование продуктов для контент менеджера
     */
    public function productEditContent(Request $request)
    {
        $id = $request->id;

        $product = Product::where('products.id', $id);
        $product = $product->selectStockInfo();
        $product = $product->selectStockTable();
        $product = $product->first();


        return view('includes.editproductform', [
            'product' => $product
        ]);
    }

    /**
     * productUpdateContent
     * Обновление продуктов для контент менеджера
     */
    public function productUpdateContent(Request $request)
    {
        $request->validate([
            'part_model' => 'required',
            'part_link' => 'required',
            'part_cost' => 'required',
            'part_count' => 'required',
        ]);


        $part_status = $request->part_status == "on" ? 1 : 0;
        $part_return = $request->part_return == "on" ? 1 : 0;


        $percent = (1 - intval($request->price) / intval($request->part_cost)) * 100;

        Product::where('id', $request->id)
            ->update([
                'part_model' => $request->part_model,
                'part_comment' => $request->part_comment,
                'part_comment_for_client' => $request->part_comment_for_client,
                'part_link' => $request->part_link,
                'part_cost' => $request->part_cost,
                'part_count' => $request->part_count,
                'part_status' => $part_status,
                'part_return' => $part_return
            ]);

        if ($request->marker == 'new') {
            Stock::updateOrCreate([
                'product_id' => $request->id
            ], [
                'stock' => 'new',
                'percent' => round($percent),
                'price' => $request->price
            ]);
        }

        if ($request->marker == 'discount') {
            Stock::updateOrCreate([
                'product_id' => $request->id
            ], [
                'stock' => 'discount',
                'percent' => round($percent),
                'price' => $request->price
            ]);
        }

        if ($request->marker == 'without') {
            Stock::where('product_id', $request->id)->delete();
        }



        return redirect()->back()->with('success', 'Ок, товар обновлен')
            ->with('message', 'Главное помни: ты красавчик!');
    }


    /**
     * navigationEdit
     * Редактирование навигации в административной панеле
     */
    public function navigationEdit()
    {
        $parttype = PartType::get();

        return view('admin', [
            'page'           => 'navigation',
            'navigations'    =>  $this->navigation(),
            'parttype'       =>  $parttype,
        ]);
    }

    /**
     * navigationEditDeleteSection
     * Удаление раздела навигации
     */
    public function navigationEditDeleteSection(Request $request)
    {
        NavigationAdditional::where('additional_id', $request->id)->delete();
        Navigation::where('id', $request->id)->delete();
        return redirect()->back();
    }

    /**
     * navigationEditDeleteSubsection
     * Удаление подраздела навигации
     */
    public function navigationEditDeleteSubsection(Request $request)
    {

        NavigationAdditional::where('id', $request->id)->delete();
        return redirect()->back();
    }

    /**
     * navigationEditDeleteSection
     * Обновлние раздела навигации
     */
    public function navigationEditSaveSection(Request $request)
    {

        $navigations = Navigation::find($request->id);

        $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|alpha_dash|unique:navigations,slug,' . $navigations->id
        ]);


        $navigations->name = $request->name;
        $navigations->slug = $request->slug;
        $navigations->show = $request->show;

        $navigations->save();

        return redirect()->back();
    }

    /**
     * navigationEditSaveSubsection
     * Обновление подраздела навигации
     */
    public function navigationEditSaveSubsection(Request $request)
    {

        $navigations = NavigationAdditional::find($request->id);

        $request->validate([
            'additional_name' => 'required|max:255',
            'additional_id' => 'required|alpha_dash|unique:navigation_additionals,additional_id,' . $navigations->id
        ]);        

        $parttype = PartType::find($request->additional_id);
        $parttype_link = $parttype->parttype_link;

        // $navigations->navigation_id = $request->navigation_id;
        $navigations->additional_id = $request->additional_id;
        $navigations->additional_name = $request->additional_name;
        $navigations->additional_slug = $parttype_link;
        $navigations->show = $request->show;

        $navigations->save();

        return redirect()->back();
    }

    /**
     * navigationEditAddSection
     * Добавление раздела навигации
     */
    public function navigationEditAddSection(Request $request)
    {

        $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|alpha_dash|unique:navigations'
        ]);

        $navigations = new Navigation();
        $navigations->name = $request->name;
        $navigations->slug = $request->slug;
        $navigations->show = $request->show;
        $navigations->save();

        return redirect()->back();
    }
    /**
     * navigationEditAddSubsection
     * Добавление подраздела навигации
     */
    public function navigationEditAddSubsection(Request $request)
    {
        $request->validate([
            'additionalname' => 'required|max:255',
            'additional_id' => 'required|alpha_dash|unique:navigation_additionals'
        ]);

        $parttype = PartType::find($request->additional_id);
        $parttype_link = $parttype->parttype_link;


        $navigations_additional = new NavigationAdditional();
        $navigations_additional->navigation_id = $request->navigation_id;
        $navigations_additional->additional_id = $parttype->id;
        $navigations_additional->additional_name = $request->additionalname;
        $navigations_additional->additional_slug = $parttype_link;
        $navigations_additional->show = $request->show;
        $navigations_additional->save();

        return redirect()->back();
    }


    /**
     * contactEdit
     * Редактирование контактов в административной панеле
     */
    public function contactEdit()
    {
        $contacts = Contact::get();

        return view('admin', [
            'page'           => 'contact',
            'contact'        => $contacts
        ]);
    }

    /**
     * contactEditAdd
     * Добавление контактов в административной панеле
     */
    public function contactEditAdd(Request $request)
    {

        $name = $request->name;

        $contacts = new Contact();
        $contacts->name =  $name;
        $contacts->value = $request->$name;

        if ($request->status == 'on') {
            $status = 1;
        } else {
            $status = 0;
        }

        $contacts->status = $status;
        $contacts->save();

        return redirect()->back();
    }


    /**
     * contactEditUpdate
     * Обновление контактов в административной панеле
     */
    public function contactEditUpdate(Request $request)
    {

        $name = $request->name;

        Contact::where('id', $request->id)->update([
            'name'      => $name,
            'value'     => $request->$name,
        ]);

        return redirect()->back();
    }


    /**
     * contactEditDelete
     * Удаление контактов в административной панеле
     */
    public function contactEditDelete(Request $request)
    {
        Contact::find($request->id)->delete();
        return redirect()->back();
    }

    /**
     * orderEdit
     * Редактирование заказов в административной панеле
     */
    public function orderEdit()
    {

        // $orderpart = OrderPart::with('get_product');
        // $orderpart = $orderpart->first();

        // return $orderpart;


        // $orderlist = Orderlist::latest('id');
        // $orderlist = $orderlist->with('order_parts.get_product');
        // $orderlist = $orderlist->get();
        // $orderlist = $orderlist->paginate(1);

        $orderlist = Orderlist::with('get_part.get_product')->first();

        // Сделать таким образом!!!!!!!!!!!!!!!!!

        return $orderlist;

        return view('admin', [
            'page'           => 'order',
            'orderlist'      => $orderlist,
        ]);
    }

    /**
     * orderEditAll
     * Редактирование всех заказов в административной панеле
     */
    public function orderEditAll()
    {
        $orderlist = Orderlist::latest('id');
        $orderlist = $orderlist->with('order_parts');
        $orderlist = $orderlist->with('part_box');
        $orderlist = $orderlist->get();


        return view('admin', [
            'page'           => 'order',
            'orderlist'      => $orderlist,
        ]);
    }

    /**
     * orderEditDetail
     * Редактирование отдельного заказов в административной панеле
     */
    public function orderEditDetail($id)
    {
        $orderlist = Orderlist::find($id);

        $orderparts = OrderPart::where('order_id', $orderlist->id);
        $orderparts = $orderparts->selectPartInfo();
        $orderparts = $orderparts->getProductInfo();
        $orderparts = $orderparts->getBox();
        $orderparts = $orderparts->getImgMain();
        $orderparts = $orderparts->get();

        $sum = 0;
        foreach ($orderparts as $item) {
            $sum += $item->order_count * $item->part_cost;
        }



        return view('admin', [
            'page'           => 'orderdetail',
            'order'          => $orderlist,
            'products'       => $orderparts,
            'sum'            => $sum
        ]);
    }
    /**
     * Delete Part from Order
     * Удаление товара из таблицы заказа
     */
    public function orderEditDetailDeletePart(Request $request)
    {

        $id = $request->id;

        $orderpart = OrderPart::find($id);
        $orderpart->update([
            'part_cancel'      => 1,
        ]);

        return redirect()->back();
    }


    /**
     * | Checked Payment Order
     * | Подтверждение оплаты товара
     */
    public function orderEditChecked(Request $request)
    {
        $id = $request->id;
        $payment = $request->order_payment;


        $orderlist = Orderlist::find($id);
        $orderlist->update([
            'order_payment' => $payment,
            'order_status'  => 2
        ]);

        $orderparts = OrderPart::where('order_id', $orderlist->id);
        $orderparts->update([
            'payment_status' => $payment,
            'order_status'  => 2
        ]);

        // Убираем товар из таблицы продуктов
        foreach ($orderparts->get() as $item) {
            $product = Product::find($item->part_id);
            $product->part_count = $product->part_count - $item->order_count;
            if ($product->part_count == 0) {
                $product->part_status = 1;
            }
            $product->save();
        }


        $contact['id'] = $request->id;
        $contact['order_email'] = $orderlist->order_email;
        $contact['order_lname'] = $orderlist->order_lname;
        $contact['order_fname'] = $orderlist->order_fname;
        $contact['order_mname'] = $orderlist->order_mname;


        // Добавить сумму заказа в таблицу sales
        $sale = Sale::where('sales_year', Carbon::now()->format('Y'))
            ->where('sales_month', Carbon::now()->format('m'))
            ->first();

        if ($sale == NULL) {

            $saleNew = new Sale();
            $saleNew->sales_year = Carbon::now()->format('Y');
            $saleNew->sales_month = Carbon::now()->format('m');
            $saleNew->sales_turnover = $request->sum;
            $saleNew->sales_orders = 1;
            $saleNew->save();
            
        } else {

            $sale->sales_turnover = $sale->sales_turnover + $request->sum;
            $sale->sales_orders = $sale->sales_orders + 1;
            $sale->save();
            
        }

        //Mail to client
        if (!$request->mailstatus == 'on')
            Mail::to($contact['order_email'])->send(new CheckedEmail($contact));

        return redirect()->back();
    }

    /**
     * | Tracking Order
     * | Перевод заявки в статус отправлено и присвоение трекинг номера
     */
    public function orderEditTracking(Request $request)
    {
        $orderlist = Orderlist::find($request->id);
        $orderlist->order_tracking = $request->order_tracking;
        $orderlist->order_status = 3;
        $orderlist->save();

        $orderparts = OrderPart::where('order_id', $orderlist->id);
        $orderparts->update([
            'order_status'  => 3
        ]);

        $contact['id'] = $request->id;
        $contact['order_email'] = $orderlist->order_email;
        $contact['order_lname'] = $orderlist->order_lname;
        $contact['order_fname'] = $orderlist->order_fname;
        $contact['order_mname'] = $orderlist->order_mname;
        $contact['order_city'] = $orderlist->order_city;
        $contact['order_address'] = $orderlist->order_address;
        $contact['order_tracking'] = $orderlist->order_tracking;


        //Mail to client
        if (!$request->mailstatus == 'on')
            Mail::to($contact['order_email'])->send(new CheckedEmail($contact));

        return redirect()->back();

    }

    /**
     * | Delete Payment Order
     * | Удаление заявки
     */
    public function orderEditDelete(Request $request)
    {
        // $id = $request->id;
        // $orderlist = Orderlist::find($id);

        // $orderpart = OrderPart::where('order_id', $orderlist->id);
        // $orderpart->update([
        //     'part_cancel' => 1,
        //     'order_status'  => 0
        // ]);

        // $contact['id'] = $request->id;
        // $contact['order_email'] = $orderlist->order_email;
        // $contact['order_lname'] = $orderlist->order_lname;
        // $contact['order_fname'] = $orderlist->order_fname;
        // $contact['order_mname'] = $orderlist->order_mname;

        // //Mail to client
        // if (!$request->mailstatus == 'on')
        //     Mail::to($contact['order_email'])->send(new DeleteOrderEmail($contact));

        // return redirect()->back();

    }
}

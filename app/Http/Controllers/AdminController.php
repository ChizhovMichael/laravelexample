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

        if ($request->stock !== 'without') {

            Stock::updateOrCreate([
                'product_id' => $request->id
            ], [
                'stock' => $request->stock,
                'percent' => round($percent),
                'price' => $request->price
            ]);
        } else {
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

        $request->validate([
            'additional_name' => 'required|max:255',
            'additional_id' => 'required|numeric'
        ]);

        $parttype = PartType::find($request->additional_id);
        $parttype_link = $parttype->parttype_link;

        NavigationAdditional::where('id', $request->id)->update([
            'navigation_id'     => $request->navigation,
            'additional_id'     => $parttype->id,
            'additional_name'   => $request->additional_name,
            'additional_slug'   => $parttype_link,
            'show'              => $request->show
        ]);



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
        $orderlist = Orderlist::latest('id');
        $orderlist = $orderlist->with('order_parts');
        $orderlist = $orderlist->with('part_box');
        $orderlist = $orderlist->get();
        $orderlist = $orderlist->paginate(50);

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
        $orderlist = Orderlist::with('order_parts');
        $orderlist = $orderlist->with('part_box');
        $orderlist = $orderlist->with('part_img');
        $orderlist = $orderlist->find($id);

        



        return view('admin', [
            'page'           => 'orderdetail',
            'order'          => $orderlist,
        ]);
    }
}

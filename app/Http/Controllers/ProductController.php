<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Navigation;
use App\Http\Controllers\NavigationController;
use App\Http\Controllers\SortingController;
use Cart;
use Illuminate\Support\Facades\URL;


/*************
 * | Контролер продукта/ таблицы products
 * | fillable для проверки заполняемых полей. Не забывать редактировать если 
 * | название полей в таблице изменяется
 * | 
 * | 1. Main Page (вывод всех запросов на главную страницу)
 * | 2. Get Category для Main Page (вывод всей продукции по категориям)
 * | 3. Get Stock для Main Page (вывод всей продукции по стоковости)
 * | 4. Get All Product (вывод всей продукции с погинацией и get запросами-сортировкой)
 * | 5. Item Product (получить единичный продукт)
 * | 6. Get Categories Product (вывод всей продукции с погинацией и get запросами-сортировкой по категориям)
 * | 6. Get Search Product (Получаем все продукты соответствующие критерию поиска)
 * |
 * |
 **************/



class ProductController extends Controller
{
    //
    /**
     * Function for main page. Get item
     *
     * @return \Illuminate\Http\Response
     */

    use NavigationController;
    use SortingController;


    /**********
     * | Main Page
     * | вывод всех запросов на главную страницу
     ***************/
    public function index()
    {
        // Cart::destroy();

        return view('welcome', [
            'products_main'     =>  $this->getProduct([3]),
            'products_power'    =>  $this->getProduct([2]),
            'products_led'      =>  $this->getProduct([19, 20]),
            'products_new'      =>  $this->getStockProduct('new'),
            'products_discount' =>  $this->getStockProduct('discount'),
            'navigations'       =>  $this->navigation(),
            'cart'              =>  $this->getCartCount(),
        ]);
    }


    /**********
     * | Get Category для Main Page
     * | вывод всей продукции по категориям
     ***************/
    private function getProduct($category)
    {

        $products = Product::whereIn('parttype_id', $category);
        $products = $products->selectAllInfo();
        $products = $products->selectAllTable();
        $products = $products->getImgMain();
        $products = $products->paginate(10);

        return $products;
    }

    /**********
     * | Get Stock для Main Page
     * | вывод всей продукции по стоковости
     ***************/
    private function getStockProduct($stock)
    {
        $products = Product::selectAllInfo();
        $products = $products->selectAllTable();
        $products = $products->getImgMain();
        $products = $products->whereStock($stock);

        $products = $products->paginate(10);

        return $products;
    }

    /**********
     * | Get All Product
     * | вывод всей продукции с погинацией и get запросами-сортировкой
     ***************/
    public function getAllProduct(Request $request)
    {

        // Сортировка по названию, по цене
        $sorting = $this->getSort($request->sort);

        $products = Product::selectAllInfo();
        $products = $products->selectAllTable();
        $products = $products->getImgMain();
        $products = $products->orderBy($sorting['column'], $sorting['sort']);

        // Сортировка по компаниям
        $brands = $this->getBrands($request->brands);
        $products = $brands != NUll ? $products->whereBrands($brands) : $products;


        // Сортировка по категориям
        $stock = $this->getStock($request->stock);
        $products = $stock != NULL ? $products->whereStock($stock) : $products;

        // Минимальная максимальная цена пока берет совместно с пагинацией
        $min = $products->min('part_cost');
        $max = $products->max('part_cost');


        // Сортировка по цене
        $from = $this->getFrom($request->from, $min);
        $to = $this->getTo($request->to, $max);
        $products = $products->wherePriceMore($from);
        $products = $products->wherePriceLess($to);


        // Вывод c пагинацией в 12
        $products = $products->paginate(12);


        return view('page/shop', [
            'part_types'    => $products->appends([
                'sort'      => $request->sort,
                'stock'     => $request->stock,
                'brands'    => $request->brands,
                'from'      => $from,
                'to'        => $to,
            ]),
            'navigations'   => $this->navigation(),
            'brand'         => $this->getAllBrand(NULL),
            'sort'          => $request->sort,
            'value'         => $sorting['value'],
            'sorting'       => $sorting['sorting'],
            'brands'        => $request->brands,
            'stock'         => $request->stock,
            'min'           => $min,
            'max'           => $max,
            'from'          => $from, // правильно
            'to'            => $to, // правильно
            'route'         => 'catalog', // правильно
            'part_types_id' => NULL, // правильно
            'cart'          => $this->getCartCount(),
            'search'        => NULL, // правильно
        ]);
    }




    /**********
     * | Get Categories Product
     * | вывод всей продукции с погинацией и get запросами-сортировкой по категориям
     ***************/
    public function getFullCategory($part_types_id, Request $request)
    {
        // Сортировка по названию, по цене
        $sorting = $this->getSort($request->sort);

        $categories = [];
        $navigation = Navigation::getNavigationCategories($part_types_id)->get();

        foreach ($navigation as $item) {
            array_push($categories, $item->additional_id);
        }

        $products = Product::whereIn('parttype_id', $categories);

        $products = $products->selectAllInfo();
        $products = $products->selectAllTable();
        $products = $products->getImgMain();
        $products = $products->orderBy($sorting['column'], $sorting['sort']);

        if ($products->first() === NULL) {
            return abort('404');
        }


        // Сортировка по компаниям
        $brands = $this->getBrands($request->brands);
        $products = $brands != NUll ? $products->whereBrands($brands) : $products;


        // Сортировка по категориям
        $stock = $this->getStock($request->stock);
        $products = $stock != NULL ? $products->whereStock($stock) : $products;

        // Минимальная максимальная цена пока берет совместно с пагинацией
        $min = $products->min('part_cost');
        $max = $products->max('part_cost');

        // Сортировка по цене
        $from = $this->getFrom($request->from, $min);
        $to = $this->getTo($request->to, $max);
        $products = $products->wherePriceMore($from);
        $products = $products->wherePriceLess($to);


        // Вывод c пагинацией в 12
        $products = $products->paginate(12);


        return view('page/shop', [
            'part_types'    => $products->appends([
                'sort'      => $request->sort,
                'stock'     => $request->stock,
                'brands'    => $request->brands,
                'from'      => $from,
                'to'        => $to,
            ]),
            'navigations'   => $this->navigation(),
            'brand'         => $this->getAllBrand($categories),
            'sort'          => $request->sort,
            'value'         => $sorting['value'],
            'sorting'       => $sorting['sorting'],
            'brands'        => $request->brands,
            'stock'         => $request->stock,
            'min'           => $min,
            'max'           => $max,
            'from'          => $from, // правильно
            'to'            => $to, // правильно
            'route'         => 'category.show', // правильно
            'part_types_id' => $part_types_id, // правильно
            'cart'          => $this->getCartCount(),
            'search'        => NULL, //правильно
        ]);
    }


    /**********
     * | Item Product
     * | Получить единичный продукт
     ***************/
    public function getItemProduct($slug)
    {
        $slugMain = explode('_', $slug);
        $slugMain = $slugMain[0];

        // 1. Получаем продукт по его слугу
        $products = Product::where('part_link', '=', $slug);

        // 2. Если данного продукта нет в наличии, то отображаем первый
        // из массива slugMain с таким же названием
        if ($products->first()->part_status != 0) {

            $productsExternal = Product::where('part_link', 'LIKE', '%' . $slugMain . '%');
            $productsExternal = $productsExternal->where('part_link', '!=', $slug);
            $productsExternal = $productsExternal->where('part_model', 'LIKE', '%' . $products->first()->part_model . '%');

            if ($productsExternal->doesntExist()) {

                // 3. Если такого продукта не существует
                // то идем ко всем продуктам
                $productsExternal = Product::where('part_link', 'LIKE', '%' . $slugMain . '%');
            }

            $products = $productsExternal;
            
        }

        

        $products = $products->where('part_status', '=', '0');
        $products = $products->selectAllInfoWithoutMainImg();
        $products = $products->selectAllTable();
        $products = $products->with('part_img');
        $products = $products->with('tv_img');
        $products = $products->with('matrix');
        $products = $products->first();


        $productsAdditional = Product::where('part_link', 'LIKE', '%' . $slugMain . '%');
        $productsAdditional = $productsAdditional->selectAllInfoWithoutMainImg();
        $productsAdditional = $productsAdditional->selectAllTable();
        $productsAdditional = $productsAdditional->with('matrix');
        $productsAdditional = $productsAdditional->get();
        $productsAdditional = $productsAdditional->filter(function($item) use ($products) {
            return $item->id != $products->id;
        });

        

        $productsSimilar = Product::where('part_link', 'LIKE', '%' . $slugMain . '%');
        $productsSimilar = $productsSimilar->selectAllInfo();
        $productsSimilar = $productsSimilar->selectAllTable();
        $productsSimilar = $productsSimilar->getImgMain();
        $productsSimilar = $productsSimilar->get();
        $productsSimilar = $productsSimilar->filter(function($item) use ($products) {
            return $item->id != $products->id;
        });




        if ($products->part_status == 0) {
            $action = route('product.add');
        } else {
            $action = '#';
        }

        return view('page/product', [
            'part_types'    => $products,
            'partsAdditional' => $productsAdditional,
            'productsSimilar' => $productsSimilar,
            'navigations'   => $this->navigation(),
            'cart'          =>  $this->getCartCount(),
            'action' => $action,
        ]);
    }


    /**********
     * | Add Product To Cart
     * | Добавление продукции в карзину
     ***************/
    public function addProductToCart($id, $type, $company, $tv, $img = NULL, $name, $qty, $price)
    {

        Cart::add([
            'id' => $id,
            'name' => $name,
            'qty' => $qty,
            'price' => $price,
            'options' => [
                'type' => $type,
                'company' => $company,
                'tv' => $tv,
                'img' => $img
            ],
        ]);

        return response()->json([
            'count' => Cart::count(),
            'total' => Cart::total(),
            'content' => Cart::content(),
        ]);
    }

    /**
     * | Get Search Product
     * | Получаем все продукты соответствующие критерию поиска
     */
    public function getSearchProduct($search, Request $request)
    {
        // Сортировка по названию, по цене
        $sorting = $this->getSort($request->sort);


        $products = Product::where('part_model', 'LIKE', '%' . $search . "%");
        $products = $products->selectAllInfo();
        $products = $products->selectAllTable();
        $products = $products->getImgMain();
        $products = $products->orderBy($sorting['column'], $sorting['sort']);


        if ($products->first() === NULL) {
            return abort('404');
        }

        // Сортировка по компаниям
        $brands = $this->getBrands($request->brands);
        $products = $brands != NUll ? $products->whereBrands($brands) : $products;

        
        

        // Сортировка по категориям
        $stock = $this->getStock($request->stock);
        $products = $stock != NULL ? $products->whereStock($stock) : $products;

        // Минимальная максимальная цена пока берет совместно с пагинацией
        $min = $products->min('part_cost');
        $max = $products->max('part_cost');

        // Сортировка по цене
        $from = $this->getFrom($request->from, $min);
        $to = $this->getTo($request->to, $max);
        $products = $products->wherePriceMore($from);
        $products = $products->wherePriceLess($to);

        // Вывод c пагинацией в 12
        
        $products = $products->paginate(12);

        

        return view('page/shop', [
            'part_types'    => $products->appends([
                'sort'      => $request->sort,
                'stock'     => $request->stock,
                'brands'    => $request->brands,
                'from'      => $from,
                'to'        => $to,
            ]),
            'navigations'   => $this->navigation(),
            'brand'         => $this->getAllBrand($search),
            'sort'          => $request->sort,
            'value'         => $sorting['value'],
            'sorting'       => $sorting['sorting'],
            'brands'        => $request->brands,
            'stock'         => $request->stock,
            'min'           => $min,
            'max'           => $max,
            'from'          => $from, // правильно
            'to'            => $to, // правильно
            'route'         => 'search.product', // правильно
            'part_types_id' => NULL, // правильно
            'cart'          => $this->getCartCount(),
            'search'        => $search, //правильно
        ]);
    }
}

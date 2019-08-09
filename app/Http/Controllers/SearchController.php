<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\NavigationController;
use App\Product;
use App\Navigation;
use Jenssegers\Agent\Agent;

class SearchController extends Controller
{
    //

    use NavigationController;

    public function search(Request $request)
    {

        if ($request->ajax()) {
            $output = "";


            if ($request->category !== 'all') {

                $additional_id = [];

                $navigation = Navigation::join('navigation_additionals', 'navigations.id', '=', 'navigation_additionals.navigation_id')
                    ->selectRaw('count(*) AS cnt, additional_id')->groupBy('additional_id')
                    ->where('navigations.slug', '=', $request->category)
                    ->orWhere('navigation_additionals.additional_slug', '=', $request->category)
                    ->orderBy('cnt', 'DESC')->get();

                foreach ($navigation as $item) {
                    array_push($additional_id, $item->additional_id);
                }

                $part_types = Product::whereIn('parttype_id', $additional_id);

                $part_types = $part_types->leftJoin('companies', 'products.company_id', '=', 'companies.id')
                    ->leftJoin('tvs', 'products.tv_id', '=', 'tvs.id')
                    ->leftJoin('part_types', 'part_types.id', '=', 'products.parttype_id')
                    ->where('part_model', 'LIKE', '%' . $request->search . "%");

            } else {

                $part_types = Product::join('companies', 'products.company_id', '=', 'companies.id')
                    ->join('tvs', 'products.tv_id', '=', 'tvs.id')
                    ->join('part_types', 'products.parttype_id', '=', 'part_types.id')
                    ->where('part_model', 'LIKE', '%' . $request->search . "%");

            }

            $part_types = $part_types->paginate(8);

            if ($request->search == '')
                return $output;


            if ($part_types) {
                foreach ($part_types as $part) {
                    $output .= '<div class="articles back-body bb-light sd-12 col-12 bb pt-em-1 pb-em-1 pr-em-2 pl-em-2">' .
                        '<div class="title flex-center-between">'.
                        '<a class="hover-main sd-8 col-8 m-0 ct" href="/артикул/' . $part->part_link . '">' . $part->parttype_type . ' ' . $part->part_model . '</a>' .
                        '<p class="sd-4 col-4 text-right cm-bold">' . $part->part_cost . '</p>' .
                        '</div>' .
                        '<div class="sd-12 col-12">' .
                        '<p class="cc mt-0">' . $part->company . ' ' . $part->tv_model . '</p>' .
                        '</div>' .
                        '</div>';
                }
                return $output;
            }
        }
    }


    public function getMobilePage()
    {
        $agent = new Agent();

        if ( $agent->isDesktop() ) {

            return redirect('/');

        } else {

            return view('page/search', [
                'navigations'       =>  $this->navigation(),
                'cart'              =>  $this->getCartCount(),
            ]);

        }
        
    }
}

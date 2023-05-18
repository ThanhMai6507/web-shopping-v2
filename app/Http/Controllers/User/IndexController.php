<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryModel;
use App\Models\ProductModel;
use Cart;
use DB;


class IndexController extends Controller
{
    public function index(Request $request)
    {
        $params = $request->all();
        $categorys = CategoryModel::orderBy('id', 'ASC')->get();
        $product = ProductModel::orderBy('id', 'ASC')->paginate(12);
        $product_new = ProductModel::orderBy('id', 'ASC')->where('hot', 0)->get();
        if (!empty($params)) {
            $product = ProductModel::query();
            if (isset($params['category'])) {
                $product->orwhere('id', $params['category']);
            }
            if (isset($params['keywords'])) {
                $keywords = $params['keywords'];
                $product->orwhere('name_product', 'LIKE', '%' . $keywords . '%');
            }
            $product = $product->paginate(12);
        }

        return view('user.home')->with(compact('categorys', 'product', 'product_new'));
    }

    public function category(Request $request, $slug)
    {
        $category = CategoryModel::orderBy('id', 'ASC')->get();
        $category_id = CategoryModel::where('slug_category', $slug)->first();
        $product = ProductModel::orderBy('id', 'ASC')->where('category_id', $category_id->id)->paginate(16);
        return view('user.page.category')->with(compact('category', 'product'));
    }

    function detailProduct(Request $request, $slug)
    {
        $category = CategoryModel::orderBy('id', 'ASC')->get();
        $product = ProductModel::Where('slug_product', $slug)->first();
        $related_products = ProductModel::orderBy(DB::raw('RAND()'))->whereNotIn('id', [$product->id])->limit(3)->get();
        return view('user.page.detailProduct')
            ->with(compact('category', 'product', 'related_products'));
    }

    public
    function timkiem(Request $request)
    {
        $data = $request->all();
        $category = CategoryModel::orderBy('id', 'ASC')->get();
        $meta_title = $data['tukhoa'];
        $meta_desc = $data['tukhoa'];
        $meta_keywords = $data['tukhoa'];
        $url_canonical = $request->url();
        $tukhoa = $data['tukhoa'];
        $product_search = ProductModel::where('name_product', 'LIKE', '%' . $tukhoa . '%')->orWhere('description', 'LIKE', '%' . $tukhoa . '%')->get();

        return view('user.page.search')->with(compact('category', 'product_search', 'meta_desc', 'meta_keywords', 'meta_title', 'url_canonical'));
    }

    public function timkiemajax(Request $request)
    {
        $data = $request->all();
        if ($data['keywords']) {
            $product_search = ProductModel::where('name_product', 'LIKE', '%' . $data['keywords'] . '%')->orWhere('description', 'LIKE', '%' . $data['keywords'] . '%')->get();
            $output = ' <ul class="dropdown-menu" style="display: block;">';
            foreach ($product_search as $key => $timkiemajax) {
                $output .= '<li class="li_timkiem_ajax" style="padding: 4px 15px; "><a href="#" style="text-transform: uppercase; color: #000; padding: initial;">' . $timkiemajax->name_product . '</a></li>';
            }
            $output .= '</ul>';
            echo $output;
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Slider;
use App\Product;
use DB;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest()->get();
        $categories = Category::where('parent_id',0)->get();
        // $products = Product::latest()->take(6)->get();
        $products = DB::table('products')->leftJoin('categories', 'products.category_id', '=', 'categories.id')->select('products.*','categories.parent_id')->latest('products.created_at')->take(6)->orderBy('products.id', 'DESC')->get();
        $productsRecommend = Product::latest('views_count', 'desc')->take(6)->get();
        // dd($products);
        return view('home.home', compact('sliders','categories', 'products' , 'productsRecommend'));
    }

    public function productModal(){
        // if( $id !== null ){
        //     $product = Product::find($id);
        //     // dd($product);
        //     // $productModalComponent = view('components.product_modal' , compact('product'))->render();

        //     return response()->json([
        //         'product_modal' => $productModalComponent,
        //         'code' => 200
        //     ] , 200 );
        // }


    }


}

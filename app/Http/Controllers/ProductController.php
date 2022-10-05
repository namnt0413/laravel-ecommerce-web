<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Product;
use App\ProductImage;

class ProductController extends Controller
{
    //
    public function index(){
        $categories = Category::where('parent_id',0)->get();
        $products = Product::latest()->take(6)->get();
        return view('product.index', compact('categories', 'products'));
    }

    public function category($slug, $categoryId){
        // dd('list category');
        $categories = Category::where('parent_id',0)->get();
        $categorysLimit = Category::where('parent_id', 0)->take(3)->get();
        $products = Product::where('category_id', $categoryId)->paginate(6);
       return view('product.category.list', compact('categorysLimit', 'products' , 'categories'));
    }

    public function detail($productId){
        // dd('list category');
        $categories = Category::where('parent_id',0)->get();
        $categorysLimit = Category::where('parent_id', 0)->take(3)->get();
        $product = Product::where('id', $productId)->get();
        $product_images = ProductImage::where('product_id', $productId)->get();
        $category_id = Product::select('category_id')->where('id', $productId)->get()->toArray();
        // dd($category_id[0]["category_id"]); lay ra id category cua san pham
        $related_products = Product::where('category_id',$category_id[0]["category_id"])->get();
       return view('product.detail.index', compact('categorysLimit', 'product' , 'categories' , 'product_images' , 'related_products', 'category_id'));
    }

}

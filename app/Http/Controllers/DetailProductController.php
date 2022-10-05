<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Product;

class DetailProductController extends Controller
{
    //
    public function index(){
        $categories = Category::where('parent_id',0)->get();
        $products = Product::latest()->take(6)->get();
        return view('detail_product.index', compact('categories', 'products'));
    }
}

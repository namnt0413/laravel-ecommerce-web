<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Product;

class CartController extends Controller
{
    //
    public function index(){
        $categories = Category::where('parent_id',0)->get();

        $carts = session()->get('cart');
        return view('cart.index' , compact('carts' , 'categories'));
    }

    public function addToCart($id)
    {
        // dd('add to cart' . $id );    //check ajax

        // session()->flush('cart');  // refresh session
        // dd('end');

        $product = Product::find($id);
        $cart = session()->get('cart');
        if( isset($cart[$id]) ){ // trong gio hang da co sp nay roi
            $cart[$id]['quantity'] =  $cart[$id]['quantity'] + 1;
        } else {
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'image' => $product->image_path,

            ];
        }
        //update session cart
        session()->put('cart' , $cart);
        // echo "<pre>";
        // print_r(session()->get('cart'));

        return response()->json([
            'code' => 200,
            'message' => 'success',
        ], 200 );
    }

    public function showCart(){
        // echo "<pre>";
        // print_r(session()->get('cart'));
        $categories = Category::where('parent_id',0)->get();

        $carts = session()->get('cart');
        return view('cart.index' , compact('carts' , 'categories'));
    }

    public function updateCart(Request $request){
        $categories = Category::where('parent_id',0)->get();
        // dd($request->all());
        if( $request->id && $request->quantity ){
            $carts = session()->get('cart');
            $carts[$request->id]['quantity'] = $request->quantity;
            session()->put('cart', $carts);
            $cartComponent = view('cart.components.cart_component' , compact('carts','categories'))->render();

            return response()->json([
                'cart_component' => $cartComponent,
                'code' => 200
            ] , 200 );
        }
    }

    public function deleteCart(Request $request) {
        $categories = Category::where('parent_id',0)->get();
        // dd($request->all());
        if( $request->id ){
            $carts = session()->get('cart');
            unset($carts[$request->id]);
            session()->put('cart', $carts);
            $cartComponent = view('cart.components.cart_component' , compact('carts','categories'))->render();

            return response()->json([
                'cart_component' => $cartComponent,
                'code' => 200
            ] , 200 );
        }
    }
}

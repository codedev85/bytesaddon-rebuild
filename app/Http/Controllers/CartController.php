<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
Use Auth;
use Validator;
use App\Product;
use App\Category;

class CartController extends Controller
{
    //

    public function addToCart(Request $request , $product){

        $product = Product::where('id',$product)->firstorfail();

        $qty     = $request->input('qty');

        if($qty){
            $qty;
        }else{
            $qty = 1;

        }


        $rowId  = $product->id;

        // add the product to cart

        $cart = Cart::add(array(
                'id'         => $rowId,
                'name'       => $product->name,
                'price'      => $product->amount,
                 'quantity'   => $qty,
                'attributes' => array([
               ]),
                'associatedModel' => $product
            ));


        if($cart){
            echo 'done';
        }
    }

    public function getItem(){

        $cartCollection = Cart::getContent();
        // return $cartCollection->toArray();;
        $categories = Category::limit(10)->get();

        return view('homepage.cart',compact('cartCollection', 'categories'));
    }

    public function checkout(){

        $cartCollection = Cart::getContent();
        $categories = Category::limit(10)->get();

        return view('homepage.checkout',compact('cartCollection','categories'));
    }

    public function removeCart($cart){

        Cart::remove($cart);

        alert()->success('Product removed from cart successfully', 'Success')->autoclose(5000);

        return back();
    }

}

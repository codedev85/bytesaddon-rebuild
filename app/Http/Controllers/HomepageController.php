<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Cart;


class HomepageController extends Controller
{
    //
    public function index(){

        $products = Product::orderby('created_at','desc')->limit(8)->get();
        $oldproducts = Product::limit(8)->inRandomOrder()->get();
        $randomproducts = Product::limit(9)->inRandomOrder()->get();
        $cartCollection = Cart::getContent();
        $categories = Category::limit(10)->get();

        // $landingpageImage = Product::inrandomorder()->limit(2)->get();

        return view('homepage.index',compact('products','oldproducts','randomproducts','cartCollection','categories'));
    }

    public function show($product){

       $product =  Product::where('id',$product)->with('category')->firstorfail();
       $randomproducts = Product::limit(9)->inRandomOrder()->get();
       $cartCollection = Cart::getContent();
       $categories = Category::limit(10)->get();

        return view('homepage.show',compact('product','randomproducts','cartCollection','categories'));
    }



    public function fetchProductCategory($category){

        $products = Product::where('category_id',$category)->paginate(2);
        $categories = Category::limit(10)->get();
        $allcats = Category::limit(20)->get();

        return view('homepage.categories',compact('products','categories','allcats'));
    }
}

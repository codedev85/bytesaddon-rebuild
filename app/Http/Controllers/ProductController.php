<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;
use Cart;
Use Auth;
use Validator;


class ProductController extends Controller
{
    //

    public function index(){

        $products = Product::orderby('created_at','desc')->with('category')->paginate(10);
        return view('product.all', compact('products'));
    }

    public function create(){

        $categories = Category::get();
        return view('product.add',compact('categories'));
    }


    public function store(Request $request){

           $data = request()->validate([
                'product_name' => 'required',
                'amount'       => 'required|integer',
                'description'  =>  'required',
                'category'     =>  'required|integer',
            ]);

        if ($request->hasFile('image1') && $request->hasFile('image2') && $request->hasFile('image3')) {

            $this->validate($request, [
                'image1' => 'required|mimes:jpeg,png,jpg,gif,svg|dimensions:min_width=555,min_height=600',
                'image2' => 'required|mimes:jpeg,png,jpg,gif,svg|dimensions:min_width=555,min_height=600',
                'image3' => 'required|mimes:jpeg,png,jpg,gif,svg|dimensions:min_width=555,min_height=600',
            ]);

            $image =  $request->file('image1');
            $ext = $image->getClientOriginalExtension();
            $image_resize = Image::make($image->getRealPath());
            $resize = Image::make($image_resize)->fit(555, 600)->encode($ext);
            $hash = md5($resize->__toString());
            $path = "{$hash}.$ext";
            $url = 'product/'.$path;
            Storage::put($url, $resize->__toString());

            $image2 =  $request->file('image2');
            $ext2 = $image2->getClientOriginalExtension();
            $image_resize2 = Image::make($image2->getRealPath());
            $resize2 = Image::make($image_resize2)->fit(555, 600)->encode($ext2);
            $hash2 = md5($resize2->__toString());
            $path2 = "{$hash2}.$ext2";
            $url2 = 'product/'.$path2;
            Storage::put($url2, $resize2->__toString());

            $image3 =  $request->file('image3');
            $ext3 = $image3->getClientOriginalExtension();
            $image_resize3 = Image::make($image3->getRealPath());
            $resize3 = Image::make($image_resize3)->fit(555, 600)->encode($ext3);
            $hash3 = md5($resize3->__toString());
            $path3 = "{$hash3}.$ext3";
            $url3 = 'product/'.$path3;
            Storage::put($url3, $resize3->__toString());

            $product = new Product();

            $product->name        = $data['product_name'];
            $product->description = $data['description'];
            $product->amount      = $data['amount'];
            $product->category_id = $data['category'];
            $product->image1      = $url;
            $product->image2      = $url2;
            $product->image3      = $url3;
            $product->save();

            alert()->success('Product Saved successfully', 'Success')->autoclose(5000);

            return redirect('/all/products');

        }else{

            alert()->error('Something went wrong', 'oops!!')->autoclose(5000);

            return back();
        }
    }


    public function show($product){

            $findProduct = Product::where('id',$product)->with('category')->firstorfail();

            return view('product.show',compact('findProduct'));

    }

    public function edit($product){

        $product = Product::where('id',$product)->with('category')->firstorfail();
        $categories = Category::get();
        return view('product.edit',compact('product','categories'));
    }

    public function update(Request $request , $product){


            $data = request()->validate([
                'product_name' => 'required',
                'amount'       => 'required|integer',
                'description'  =>  'required',
                'category'     =>  'required|integer',
            ]);

            if ($request->hasFile('image1') && $request->hasFile('image2') && $request->hasFile('image3')) {

                $this->validate($request, [
                    'image1' => 'required|mimes:jpeg,png,jpg,gif,svg|dimensions:min_width=555,min_height=600',
                    'image2' => 'required|mimes:jpeg,png,jpg,gif,svg|dimensions:min_width=555,min_height=600',
                    'image3' => 'required|mimes:jpeg,png,jpg,gif,svg|dimensions:min_width=555,min_height=600',
                ]);

                $image =  $request->file('image1');
                $ext = $image->getClientOriginalExtension();
                $image_resize = Image::make($image->getRealPath());
                $resize = Image::make($image_resize)->fit(555, 600)->encode($ext);
                $hash = md5($resize->__toString());
                $path = "{$hash}.$ext";
                $url = 'product/'.$path;
                Storage::put($url, $resize->__toString());

                $image2 =  $request->file('image2');
                $ext2 = $image2->getClientOriginalExtension();
                $image_resize2 = Image::make($image2->getRealPath());
                $resize2 = Image::make($image_resize2)->fit(555, 600)->encode($ext2);
                $hash2 = md5($resize2->__toString());
                $path2 = "{$hash2}.$ext2";
                $url2 = 'product/'.$path2;
                Storage::put($url2, $resize2->__toString());

                $image3 =  $request->file('image3');
                $ext3 = $image3->getClientOriginalExtension();
                $image_resize3 = Image::make($image3->getRealPath());
                $resize3 = Image::make($image_resize3)->fit(555, 600)->encode($ext3);
                $hash3 = md5($resize3->__toString());
                $path3 = "{$hash3}.$ext3";
                $url3 = 'product/'.$path3;
                Storage::put($url3, $resize3->__toString());

                Product::where('id',$product)->update([
                    'name'        => $data['product_name'],
                    'amount'      => $data['amount'],
                    'description' => $data['description'],
                    'category_id' => $data['category'],
                    'image1'      =>  $url,
                    'image2'      => $url2,
                    'image3'      => $url3,
                ]);

                alert()->success('Product Updated successfully', 'Success')->autoclose(5000);

                return redirect('/all/products');

            }else{

                Product::where('id',$product)->update([
                    'name'        => $data['product_name'],
                    'amount'      => $data['amount'],
                    'description' => $data['description'],
                    'category_id' => $data['category'],
                ]);

                alert()->success('Product Updated successfully', 'Success')->autoclose(5000);

                return redirect('/all/products');
            }

    }

    public function outofStock($product){

        Product::where('id',$product)->update([
            'status' => 0,
        ]);

        alert()->success('Product Status Updated successfully', 'Success')->autoclose(5000);

        return redirect('/all/products');

    }

    Public function limitedstock($product){

        Product::where('id',$product)->update([
            'status' => 1,
        ]);

        alert()->success('Product Status Updated successfully', 'Success')->autoclose(5000);

        return redirect('/all/products');

    }


    Public function stock($product){

        Product::where('id',$product)->update([
            'status' => 2,
        ]);

        alert()->success('Product Status Updated successfully', 'Success')->autoclose(5000);

        return redirect('/all/products');

    }

  
}

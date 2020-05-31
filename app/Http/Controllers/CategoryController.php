<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    //

    public function allCategory(){

        $cats = Category::orderby('created_at','DESC')->paginate(5);
        return view('category.all',compact('cats'));
    }

    public function addCategory(){

        return view('category.add');
    }

    public function store(Request $request){

       $data =  request()->validate([
                  'category'=> 'required',
                ]);

       $cat = new Category();
       $cat->name = $request->input('category');
       $cat->save();

       alert()->success('Category saved successfully', 'Success')->autoclose(5000);
       return redirect('/all/category');
    }


    public function edit($cat){

        $findCat = Category::where('id',$cat)->firstorfail();

        return view('category.edit',compact('findCat'));
    }

    public function update(Request $request ,$cat){

            request()->validate([
                'category'=> 'required',
            ]);


            Category::where('id',$cat)->update([
                'name' => $request->input('category'),
            ]);

        alert()->success('Category updated successfully', 'Success')->autoclose(5000);
        return redirect('/all/category');
    }


}

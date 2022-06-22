<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SubCategoriesController extends Controller
{

    public function index()
    {

         $subcategories=SubCategory::with('category')->get();
        return view('layouts.SubCategories.index',compact('subcategories'),);
    }
    public function subCategory()
    {
        $categories=Category::all();
        return view('layouts.SubCategories.add',compact('categories'));
    }
        public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'banner_image' => 'required',
            'square_image' => 'required',
        ]);
        try {
            if ($request->hasFile('banner_image')) {
                $file = $request->file('banner_image');
                $extention = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extention;
                $banner_image= $file->move('uploads/Sub_Categories/banner_images/' , $filename);

            }
            if ($request->hasFile('square_image')) {
                $file = $request->file('square_image');
                $extention = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extention;
                $square_image= $file->move('uploads/Sub_Categories/square_images/' , $filename);

            }
            if ($request['id'] == ""){
                SubCategory::create([
                    'name'=> $request['name'],
                    'category_id'=> $request['category_id'],
                    'banner_image'=> $banner_image,
                    'square_image' => $square_image,
                ]);
                Session::flash('success','Sub Category Create Successfully');
                return redirect('sub_categories');
            }else {
                $category= SubCategory::whereId($request['id'])->first();
                $category->update([
                    'name'=> $request['name'],
                    'category_id'=> $request['category_id'],
                    'banner_image'=> $banner_image,
                    'square_image' => $square_image,
                ]);
                Session::flash('success','Sub Category update Successfully');
                return redirect('sub_categories');
            }
        }catch (\Exception $exception){
            return redirect()->back()->with('error', $exception->getMessage() .' '.$exception->getLine());

        }
    }
    public function edit($id)
    {
        $categories=Category::all();
        $subcategories= SubCategory::all();
        $detail=SubCategory::whereId($id)->first();
        return view("layouts.SubCategories.add",['detail'=>$detail, 'categories'=>$categories,'subcategories'=>$subcategories]);
    }
    public function destroy($id)
    {
        SubCategory::whereId($id)->delete();
        Session::flash("success","record deleted successfully");
        return redirect('sub_categories');
    }
}

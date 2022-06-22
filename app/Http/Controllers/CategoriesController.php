<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use phpDocumentor\Reflection\Types\Null_;
use Yajra\DataTables\Facades\DataTables;

class CategoriesController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view('layouts.Categories.index',compact('categories'));
    }

    public function addCategory()
    {
        return view('layouts.Categories.add');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'banner_image' => 'required',
            'square_image' => 'required',
        ]);
        try {
                if ($request->hasFile('banner_image')) {
                    $file = $request->file('banner_image');
                    $extention = $file->getClientOriginalExtension();
                    $filename = time() . '.' . $extention;
                   $banner_image= $file->move('uploads/banner_images/' , $filename);

                }
                if ($request->hasFile('square_image')) {
                    $file = $request->file('square_image');
                    $extention = $file->getClientOriginalExtension();
                    $filename = time() . '.' . $extention;
                    $square_image= $file->move('uploads/square_images/' , $filename);

                }
                if ($request['id'] == ""){
                Category::create([
                    'name'=> $request['name'],
                    'banner_image'=> $banner_image,
                    'square_image' => $square_image,
                ]);
                Session::flash('success','Category Create Successfully');
                return redirect('categories');
            }else {
                    $category= Category::whereId($request['id'])->first();
                    $category->update([
                    'name'=> $request['name'],
                    'banner_image'=> $banner_image,
                    'square_image' => $square_image,
                ]);
                        Session::flash('success','Category update Successfully');
                        return redirect('categories');
                    }
            }catch (\Exception $exception){
                        return redirect()->back()->with('error', $exception->getMessage() .' '.$exception->getLine());

        }
    }

    public function editcategory($id){
        $categories=Category::all();
        $detail=Category::whereId($id)->first();
        return view("layouts.Categories.add",['detail'=>$detail, 'categories'=>$categories,]);

    }
    public function destroy($id)
    {
        Category::whereId($id)->delete();
        Session::flash("success","record deleted successfully");
        return redirect('categories');
    }
}

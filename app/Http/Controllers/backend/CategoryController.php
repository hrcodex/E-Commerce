<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //category page View
    public function index()
    {
        $category = Category::all();
        return view('backend.category.index', ['category' => $category]);
    }

    //store new Category
    public function store(Request $request)
    {
        $category = new Category();
        $category->category_name = $request->category_name;
        $category->category_slug = Str::of($request->category_name)->slug('-');
        $category->save();

        $notification = array('messege' => 'Save Successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    //delete Category
    public function destory($id)
    {
        $category = Category::find($id);
        $category->delete();

        $notification = array('messege' => 'Delete Successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    //edit Category
    public function edit($id)
    {
        $category = Category::find($id);
        return response()->json($category);
    }

    //update Category
    public function update(Request $request)
    {
        $category = Category::find($request->category_id);
        $category->category_name = $request->category_name;
        $category->category_slug = Str::of($request->category_name)->slug('-');
        $category->save();

        $notification = array('messege' => 'Update Successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}

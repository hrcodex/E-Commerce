<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //sub-category page View
    public function index()
    {

        //query builder
        // $subacegory = DB::table('subcategories')->leftjoin('categories', 'subcategories.category_id', 'categories.id')->select('subcategories.*', 'categories.category_name')->get();

        //Eloquent ORM
        $subacegory = Subcategory::all();



        $category = Category::all();
        return view('backend.category.sub_categories.index', ['subacegory' => $subacegory, 'category' => $category]);
    }


    //store new Sub Category
    public function store(Request $request)
    {
        $subcategory = new Subcategory();
        $subcategory->category_id  = $request->category_id;
        $subcategory->subcategory_name = $request->subcategory_name;
        $subcategory->subcategory_slug = Str::of($request->subcategory_name)->slug('-');
        $subcategory->save();

        $notification = array('messege' => 'Save Successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    //delete SubCategory
    public function destory($id)
    {
        $category = Subcategory::find($id);
        $category->delete();

        $notification = array('messege' => 'Delete Successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    //edit SubCategory
    public function edit($id)
    {
        $subcategory = Subcategory::find($id);
        return response()->json($subcategory);
    }

    //update SubCategory
    public function update(Request $request)
    {
        $Subcategory = Subcategory::find($request->subcategory_id);
        $Subcategory->category_id = $request->category_id;
        $Subcategory->subcategory_name = $request->subcategory_name;
        $Subcategory->subcategory_slug = Str::of($request->subcategory_name)->slug('-');
        $Subcategory->save();

        $notification = array('messege' => 'Update Successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}

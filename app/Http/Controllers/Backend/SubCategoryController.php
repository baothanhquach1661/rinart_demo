<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use Image;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    public function index()
    {
        $subcat = SubCategory::latest()->get();
        return view('backend.subcategory.index', compact('subcat'));
    }


    public function create()
    {
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        return view('backend.subcategory.create', compact('categories'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'subcategory_name_en' => 'required',
            'subcategory_name_vi' => 'required',
        ]);

        SubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_vi' => $request->subcategory_name_vi,
            'subcategory_slug_en' => Str::slug($request->subcategory_name_en),
            'subcategory_slug_vi' => Str::slug($request->subcategory_name_vi),
        ]);

        $notification = array(
            'message' => 'SubCategory has been created',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.subcategory.index')->with($notification); 

    } // end  method


    public function edit($id)
    {
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $subcat = SubCategory::find($id);
        return view('backend.subcategory.edit', compact('subcat', 'categories'));

    }


    public function update(Request $request)
    {
        $subcat_id = $request->id;

        SubCategory::findOrFail($subcat_id)->update([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_vi' => $request->subcategory_name_vi,
            'subcategory_slug_en' => Str::slug($request->subcategory_name_en),
            'subcategory_slug_vi' => Str::slug($request->subcategory_name_vi),
        ]);

        $notification = array(
            'message' => 'SubCategory Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('admin.subcategory.index')->with($notification); 

    } // end method


    public function delete($id)
    {
        SubCategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'SubCategory Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification); 
    }





















}

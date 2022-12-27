<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        return view('backend.category.index', compact('categories'));
    }


    public function create()
    {
        return view('backend.category.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'category_name_en' => 'required',
            'category_name_vi' => 'required',
        ]);

        Category::insert([
            'category_name_en' => $request->category_name_en,
            'category_name_vi' => $request->category_name_vi,
            'category_slug_en' => Str::slug($request->category_slug_en),
            'category_slug_vi' => Str::slug($request->category_slug_vi),
            'category_icon' => $request->category_icon,
        ]);

        $notification = array(
            'message' => 'Category has been created',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.category.index')->with($notification); 

    } // end  method


    public function edit($id)
    {
        $category = Category::find($id);
        return view('backend.category.edit', compact('category'));

    }


    public function update(Request $request)
    {
        $cat_id = $request->id;

        Category::findOrFail($cat_id)->update([
            'category_name_en' => $request->category_name_en,
            'category_name_vi' => $request->category_name_vi,
            'category_slug_en' => Str::slug($request->category_slug_en),
            'category_slug_vi' => Str::slug($request->category_slug_vi),
            'category_icon' => $request->category_icon,
        ]);

        $notification = array(
            'message' => 'Category Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.category.index')->with($notification); 

    } // end method


    public function delete($id)
    {
        Category::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 
    }








































}

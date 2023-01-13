<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
use Image;

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
            'category_image' => 'required',
        ]);

        $image = $request->file('category_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(160,110)->save('upload/categories/'.$name_gen);
        $save_url = 'upload/categories/'.$name_gen;

        Category::insert([
            'category_name_en' => $request->category_name_en,
            'category_name_vi' => $request->category_name_vi,
            'category_slug_en' => Str::slug($request->category_name_en),
            'category_slug_vi' => Str::slug($request->category_name_vi),
            'category_icon' => $request->category_icon,
            'category_image' => $save_url,
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
        $old_image = $request->old_image;

        if ($request->file('category_image')){

            unlink($old_image);

            $image = $request->file('category_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            Image::make($image)->resize(160,110)->save('upload/categories/'.$name_gen);
            $save_url = 'upload/categories/'.$name_gen;

            Category::findorfail($cat_id)->update([
                'category_name_en' => $request->category_name_en,
                'category_name_vi' => $request->category_name_vi,
                'category_slug_en' => Str::slug($request->category_name_en),
                'category_slug_vi' => Str::slug($request->category_name_vi),
                'category_icon' => $request->category_icon,
                'category_image' => $save_url,
            ]);

            $notification = array(
                'message' => 'Category Updated with Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.category.index')->with($notification);
        } else {

            Category::findorfail($cat_id)->update([
                'category_name_en' => $request->category_name_en,
                'category_name_vi' => $request->category_name_vi,
                'category_slug_en' => Str::slug($request->category_name_en),
                'category_slug_vi' => Str::slug($request->category_name_vi),
                'category_icon' => $request->category_icon,
            ]);

            $notification = array(
                'message' => 'Category Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.category.index')->with($notification);
        } // end else

    } // end method


    public function delete($id)
    {

        $category = Category::findorfail($id);
        $image = $category->category_image;
        unlink($image);

        Category::findorfail($id)->delete();

        $notification = array(
                'message' => 'Category Deleted Successfully',
                'alert-type' => 'success'
            );

        return redirect()->back()->with($notification);
    }








































}

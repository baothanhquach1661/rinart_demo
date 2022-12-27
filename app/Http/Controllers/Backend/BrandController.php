<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Image;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::latest()->get();
        return view('backend.brand.index', compact('brands'));
    }


    public function create()
    {
        return view('backend.brand.create');
    }


    public function store(Request $request)
    {

        $request->validate([
            'brand_name_en' => 'required',
            'brand_name_vi' => 'required',
            'brand_image' => 'required',
        ]);

        $image = $request->file('brand_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('upload/brand_logo/'.$name_gen);
        $save_url = 'upload/brand_logo/'.$name_gen;

        Brand::insert([
            'brand_name_en' => $request->brand_name_en,
            'brand_name_vi' => $request->brand_name_vi,
            'brand_slug_en' => Str::slug($request->brand_name_en),
            'brand_slug_vi' => Str::slug($request->brand_name_vi),
            'brand_image' => $save_url,
        ]);

        $notification = array(
            'message' => 'Brand logo has been created',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.brand.index')->with($notification);

    } // end method


    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('backend.brand.edit', compact('brand'));

    }


    public function update(Request $request)
    {
        $brand_id = $request->id;
        $old_image = $request->old_image;

        if ($request->file('brand_image')){

            unlink($old_image);

            $image = $request->file('brand_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            Image::make($image)->resize(300,300)->save('upload/brand_logo/'.$name_gen);
            $save_url = 'upload/brand_logo/'.$name_gen;

            Brand::findorfail($brand_id)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_vi' => $request->brand_name_vi,
                'brand_slug_en' => Str::slug($request->brand_name_en),
                'brand_slug_vi' => Str::slug($request->brand_name_vi),
                'brand_image' => $save_url,
            ]);

            $notification = array(
                'message' => 'Brand Logo Updated with Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.brand.index')->with($notification);
        } else {

            Brand::findorfail($brand_id)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_vi' => $request->brand_name_vi,
                'brand_slug_en' => Str::slug($request->brand_name_en),
                'brand_slug_vi' => Str::slug($request->brand_name_vi),
                'video_url' => $request->video_url,
            ]);

            $notification = array(
                'message' => 'Brand Logo Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.brand.index')->with($notification);
        } // end else
    } // end method


    public function delete($id)
    {
        $brand = Brand::findorfail($id);
        $image = $brand->brand_image;
        unlink($image);

        Brand::findorfail($id)->delete();

        $notification = array(
                'message' => 'Brand Logo Deleted Successfully',
                'alert-type' => 'success'
            );

        return redirect()->back()->with($notification);
    }












}




































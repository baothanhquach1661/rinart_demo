<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use Carbon\Carbon;
use App\Models\Slider;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest()->get();

        return view('backend.slider.index', compact('sliders'));
    }


    public function create()
    {
        return view('backend.slider.create');
    }


    public function store(Request $request)
    {
        $request->validate([

            'slider_image' => 'required',
        ],[
            'slider_image.required' => 'Please Insert Slide Image!!!',

        ]);

        $image = $request->file('slider_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(870,370)->save('upload/slides/'.$name_gen);
        $save_url = 'upload/slides/'.$name_gen;

        Slider::insert([
            'title' => $request->title,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'slider_image' => $save_url,

        ]);

        $notification = array(
            'message' => 'Slider Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.slider.index')->with($notification);
    }


    public function edit($id)
    {
        $sliders = Slider::findOrFail($id);
        return view('backend.slider.edit', compact('sliders'));
    }


    public function update(Request $request)
    {
        $slider_id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('slider_image')) {

        unlink($old_img);

        $image = $request->file('slider_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(870,370)->save('upload/slides/'.$name_gen);
        $save_url = 'upload/slides/'.$name_gen;

        Slider::findOrFail($slider_id)->update([
            'title' => $request->title,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'slider_image' => $save_url,

        ]);

        $notification = array(
            'message' => 'Slider Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('admin.slider.index')->with($notification);

        }else{

            Slider::findOrFail($slider_id)->update([
                'title' => $request->title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,


        ]);

            $notification = array(
                'message' => 'Slider Updated Without Image Successfully',
                'alert-type' => 'info'
            );

            return redirect()->route('admin.slider.index')->with($notification);
        }
    }


    public function delete($id)
    {
        $slider = Slider::findOrFail($id);
        $img = $slider->slider_image;
        unlink($img);
        Slider::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Slider Has Been Delete Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }


    public function inActive($id)
    {
        Slider::findOrFail($id)->update(['status' => 0]);

        $notification = array(
            'message' => 'Slider Inactive Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }


    public function active($id)
    {
        Slider::findOrFail($id)->update(['status' => 1]);

        $notification = array(
            'message' => 'Slider Active Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }













}



























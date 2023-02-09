<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Price;
use App\Models\PricingBanner;
use Carbon\Carbon;
use Image;
use Illuminate\Support\Str;

class PriceController extends Controller
{
    public function pricingPage()
    {
        $data = Price::where('status', 1)->latest()->get();
        return view('frontend.home.pricing', compact('data'));
    }


    public function priceSetting()
    {
        $data = Price::latest()->get();

        return view('backend.price_list.index', compact('data'));
    }


    public function create()
    {
        return view('backend.price_list.create');
    }


    public function store(Request $request)
    {

        $image = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(640,360)->save('upload/price_list/image/'.$name_gen);
        $save_url = 'upload/price_list/image/'.$name_gen;

        $pricing_id = Price::insertGetId([
            'name_en' => $request->name_en,
            'name_vi' => $request->name_vi,
            'title_en' => $request->title_en,
            'title_slug' => Str::slug($request->title_en),
            'title_vi' => $request->title_vi,

            'short_description_en' => $request->short_description_en,
            'short_description_vi' => $request->short_description_vi,
            'long_description_en' => $request->long_description_en,

            'image' => $save_url,
            'status' => 1,
            'created_at' => Carbon::now(),

        ]);


        ////////// Multiple Image Upload Start ///////////

        $banner = $request->file('banner');

        $make_name = hexdec(uniqid()).'.'.$banner->getClientOriginalExtension();
        Image::make($banner)->resize(1600,750)->save('upload/price_list/banner/'.$make_name);
        $uploadPath = 'upload/price_list/banner/'.$make_name;



        PricingBanner::insert([

            'pricing_id' => $pricing_id,
            'photo_name' => $uploadPath,
            'created_at' => Carbon::now(), 

        ]);

      ////////// End Multiple Image Upload ///////////

        $notification = array(
            'message' => 'Price List Created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.pricing.setting')->with($notification);

    } // end method


    public function edit($id)
    {
        $banner = PricingBanner::where('pricing_id', $id)->get();
        $price_list = Price::findOrFail($id);

        return view('backend.price_list.edit',compact('banner', 'price_list'));
    }


    public function update(Request $request)
    {
        $pricing_id = $request->id;

        Price::findOrFail($pricing_id)->update([
        'name_en' => $request->name_en,
        'name_vi' => $request->name_vi,
        'title_en' => $request->title_en,
        'title_slug' => Str::slug($request->title_en),
        'title_vi' => $request->title_vi,

        'short_description_en' => $request->short_description_en,
        'short_description_vi' => $request->short_description_vi,
        'long_description_en' => $request->long_description_en,
                  
        'status' => 1,
        'updated_at' => Carbon::now(),   

      ]);

      $notification = array(
        'message' => 'Price List Updated Without Image Successfully',
        'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function updateWithBanner(Request $request)
    {
        $imgs = $request->pricing_banner;

        if($request->file('pricing_banner')){
            foreach ($imgs as $id => $img) {
                $imgDel = PricingBanner::findOrFail($id);

                $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
                Image::make($img)->resize(1600,750)->save('upload/price_list/banner/'.$make_name);
                $uploadPath = 'upload/price_list/banner/'.$make_name;

                PricingBanner::where('id',$id)->update([
                    'photo_name' => $uploadPath,
                    'updated_at' => Carbon::now(),
                ]);
            } // end foreach

            $notification = array(
                'message' => 'Price List Banner Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);

        }
    }


    public function updateImage(Request $request)
    {
        $pricing_id = $request->id;
        $oldImage = $request->old_img;
        //unlink($oldImage);

        $image = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(640,360)->save('upload/price_list/image/'.$name_gen);
        $save_url = 'upload/price_list/image/'.$name_gen;

        Price::findOrFail($pricing_id)->update([
            'image' => $save_url,
            'updated_at' => Carbon::now(),

        ]);

         $notification = array(
            'message' => 'Price List Image Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }


    public function delete($id)
    {
        $price_list = Price::findOrFail($id);
        unlink($price_list->image);
        Price::findOrFail($id)->delete();

        $oldimg = PricingBanner::findOrFail($id);
        unlink($oldimg->photo_name);
        PricingBanner::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Price List Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function pricingInactive($id)
    {
        Price::findOrFail($id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Price List Inactive',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function pricingActive($id)
    {
        Price::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Price List Active',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function priceDetail($id, $slug)
    {
        $price = Price::where('title_slug', $slug)->get();
        $banner = PricingBanner::where('pricing_id', $id)->get();
        //dd($banner);
        return view('frontend.home.price_detail', compact('price', 'banner'));
    }
















}





































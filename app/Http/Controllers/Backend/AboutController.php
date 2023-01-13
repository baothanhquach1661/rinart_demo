<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use App\Models\TeamImg;
use Image;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AboutController extends Controller
{
    public function aboutSetting()
    {
        $data = About::find(1);
        $teamImgs = TeamImg::where('about_id', 1)->get();

        return view('backend.about.manage', compact('data', 'teamImgs'));
    }


    public function aboutBannerUpdate(Request $request)
    {
        $about_id = $request->id;
        $oldImage = $request->old_img;
        unlink($oldImage);

        $image = $request->file('about_banner');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(545, 440)->save('upload/about/'.$name_gen);
        $save_url = 'upload/about/'.$name_gen;

        About::findOrFail($about_id)->update([
            'about_banner' => $save_url,
            'updated_at' => Carbon::now(),

        ]);

         $notification = array(
            'message' => 'About Banner Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }


    public function aboutUpdateWithoutImage(Request $request)
    {
        $about_id = $request->id;

        About::findOrFail($about_id)->update([
        'about_title_en' => $request->about_title_en,
        'about_title_vi' => $request->about_title_vi,
        'about_short_des_en' => $request->about_short_des_en,
        'about_short_des_vi' => $request->about_short_des_vi,
        'about_long_des_en' => $request->about_long_des_en,
        'about_long_des_vi' => $request->about_long_des_vi,

        'about_box_1_title_en' => $request->about_box_1_title_en,
        'about_box_1_title_vi' => $request->about_box_1_title_vi,
        'about_box_1_des_en' => $request->about_box_1_des_en,
        'about_box_1_des_vi' => $request->about_box_1_des_vi,
        'about_box_2_title_en' => $request->about_box_2_title_en,
        'about_box_2_title_vi' => $request->about_box_2_title_vi,
        'about_box_2_des_en' => $request->about_box_2_des_en,

        'about_box_2_des_vi' => $request->about_box_2_des_vi,
        'about_box_3_title_en' => $request->about_box_3_title_en,
        'about_box_3_title_vi' => $request->about_box_3_title_vi,
        'about_box_3_des_en' => $request->about_box_3_des_en,
        'about_box_3_des_vi' => $request->about_box_3_des_vi,
        'about_banner_title_en' => $request->about_banner_title_en,

        'about_banner_title_vi' => $request->about_banner_title_vi,
        'about_banner_des_en' => $request->about_banner_des_en,
        'about_banner_des_vi' => $request->about_banner_des_vi,
        'updated_at' => Carbon::now(),   

      ]);

          $notification = array(
            'message' => 'About Page Content Updated Without Image Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function updateTeamImage(Request $request)
    {
        $imgs = $request->team_img;

        if($request->file('team_img')){
            foreach ($imgs as $id => $img) {
                $imgDel = TeamImg::findOrFail($id);

                $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
                Image::make($img)->resize(330,380)->save('upload/about/'.$make_name);
                $uploadPath = 'upload/about/'.$make_name;

                TeamImg::where('id',$id)->update([
                    'photo_name' => $uploadPath,
                    'description_en' => $request->description_en,
                    'description_vi' => $request->description_vi,
                    'updated_at' => Carbon::now(),
                ]);
            } // end foreach

            $notification = array(
                'message' => 'Team Info Updated with Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);

        }else{
            TeamImg::where('id', $id)->update([
            'description_en' => $request->description_en,
            'description_vi' => $request->description_vi,
            'updated_at' => Carbon::now(),
                ]);

            $notification = array(
                'message' => 'Team Info Updated with Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        }
        
    }


    public function addMoreMemberImage()
    {
        return view('backend.about.storeMember');
    }


    public function storeMoreMemberImage(Request $request)
    {
        $request->validate([
            'photo_name' => 'required',
            'description_en' => 'required',
            'description_vi' => 'required',
        ]);

        $image = $request->file('photo_name');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(330, 380)->save('upload/about/'.$name_gen);
        $save_url = 'upload/about/'.$name_gen;

        TeamImg::insert([
            'about_id' => 1,
            'description_en' => $request->description_en,
            'description_vi' => $request->description_vi,
            'photo_name' => $save_url,
        ]);

        $notification = array(
            'message' => 'New Member has been created',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.about.setting')->with($notification); 
    }


    public function teamImgDelete($id)
    {
        $oldimg = TeamImg::findOrFail($id);
        unlink($oldimg->photo_name);

        TeamImg::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Team Image Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function homeAbout()
    {
        $team_img = TeamImg::where('about_id', 1)->get();
        return view('frontend.home.about', compact('team_img'));
    }
































}

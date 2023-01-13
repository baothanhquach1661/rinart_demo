<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FooterSetting;
use Image;
use Carbon\Carbon;

class FooterController extends Controller
{
    public function siteSetting()
    {
        $data = FooterSetting::find(1);
        return view('backend.site_setting.footer_update', compact('data'));
    }


    public function footerSiteUpdate(Request $request)
    {
        $footer_id = $request->id;

        if ($request->file('logo_footer')){

            $image = $request->file('logo_footer');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            Image::make($image)->resize(160,40)->save('upload/footer_site/'.$name_gen);
            $save_url = 'upload/footer_site/'.$name_gen;

            FooterSetting::findorfail($footer_id)->update([
                'address' => $request->address,
                'about' => $request->about,
                'about_1' => $request->about_1,
                'about_2' => $request->about_2,
                'about_3' => $request->about_3,
                'about_4' => $request->about_4,
                'about_5' => $request->about_5,

                'account' => $request->account,
                'account_1' => $request->about_1,
                'account_2' => $request->account_2,
                'account_3' => $request->account_3,
                'account_4' => $request->account_4,
                'account_5' => $request->account_5,

                'support' => $request->support,
                'support_1' => $request->support_1,
                'support_2' => $request->support_2,
                'support_3' => $request->support_3,
                'support_4' => $request->support_4,
                'phone_1' => $request->phone_1,
                'phone_2' => $request->phone_2,

                'logo_footer' => $save_url,
                'updated_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Footer Site Data Updated with Logo Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        } else {

            FooterSetting::findorfail($footer_id)->update([
                'address' => $request->address,
                'about' => $request->about,
                'about_1' => $request->about_1,
                'about_2' => $request->about_2,
                'about_3' => $request->about_3,
                'about_4' => $request->about_4,
                'about_5' => $request->about_5,
                
                'account' => $request->account,
                'account_1' => $request->about_1,
                'account_2' => $request->account_2,
                'account_3' => $request->account_3,
                'account_4' => $request->account_4,
                'account_5' => $request->account_5,

                'support' => $request->support,
                'support_1' => $request->support_1,
                'support_2' => $request->support_2,
                'support_3' => $request->support_3,
                'support_4' => $request->support_4,
                'phone_1' => $request->phone_1,
                'phone_2' => $request->phone_2,
                'updated_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Footer Site Data Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        } // end else
    }


































}

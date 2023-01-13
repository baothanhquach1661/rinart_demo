<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FooterSetting;
use App\Models\Seo;
use Image;
use Carbon\Carbon;

class SiteSettingController extends Controller
{
    public function seoSetting()
    {
        $data = Seo::find(1);
        return view('backend.site_setting.seo_update', compact('data'));
    }


    public function seoSettingUpdate(Request $request)
    {
        $seo_id = $request->id;

        Seo::findorfail($seo_id)->update([
            'meta_title' => $request->meta_title,
            'meta_author' => $request->meta_author,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
            'google_analytics' => $request->google_analytics,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Seo Site Data Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }



































}

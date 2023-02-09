<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use Carbon\Carbon;
use App\Models\Video;

class VideoController extends Controller
{
    public function setting()
    {
        $video = Video::find(1);

        return view('backend.video.manage', compact('video'));
    }

    public function videoUpdate(Request $request)
    {
        $video_id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('video_image')) {

        unlink($old_img);

        $image = $request->file('video_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(850,500)->save('upload/video/'.$name_gen);
        $save_url = 'upload/video/'.$name_gen;

        Video::findOrFail($video_id)->update([
            'title' => $request->title,
            'video_url' => $request->video_url,
            'video_image' => $save_url,
            'updated_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Video Site Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('admin.video.setting')->with($notification);

        }else{

            Video::findOrFail($video_id)->update([
                'title' => $request->title,
                'video_url' => $request->video_url,


        ]);

            $notification = array(
                'message' => 'Video Updated Without Image Successfully',
                'alert-type' => 'info'
            );

            return redirect()->route('admin.video.setting')->with($notification);
        }
    }
}



























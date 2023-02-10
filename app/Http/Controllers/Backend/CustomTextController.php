<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\CustomText;
use Illuminate\Support\Facades\Validator;

class CustomTextController extends Controller
{
    
    public function setting()
    {
        $custom_text = CustomText::find(1);

        return view('backend.custom_text.manage', compact('custom_text'));
    }


    public function customTextUpdate(Request $request)
    {

        $this->validate($request, [
            'text_1' => 'numeric',
            'text_2' => 'numeric',
            'text_3' => 'numeric',
            'text_4' => 'numeric',
            'text_5' => 'numeric',
            'text_6' => 'numeric',
        ],
        [
            'numeric' => 'Đây phải là con số ạ',
            'text_1.numeric' => 'Đây phải là con số ạ',
            'text_2.numeric' => 'Đây phải là con số ạ',
            'text_3.numeric' => 'Đây phải là con số ạ',
            'text_4.numeric' => 'Đây phải là con số ạ',
            'text_5.numeric' => 'Đây phải là con số ạ',
            'text_6.numeric' => 'Đây phải là con số ạ',
        ]);

        $custom_id = $request->id;

        CustomText::findOrFail($custom_id)->update([
            'text_1' => $request->text_1,
            'text_1_color' => $request->text_1_color,
            'text_2' => $request->text_2,
            'text_2_color' => $request->text_2_color,
            'text_3' => $request->text_3,
            'text_3_color' => $request->text_3_color,
            'text_4' => $request->text_4,
            'text_4_color' => $request->text_4_color,
            'text_5' => $request->text_5,
            'text_5_color' => $request->text_5_color,
            'text_6' => $request->text_6,
            'text_6_color' => $request->text_6_color,
        ]);

        $notification = array(
            'message' => 'Text Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.custom_text.setting')->with($notification); 
    }


























}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function index()
    {
        $id = Auth::guard('admin')->id();
        $adminData = Admin::find($id);
        

        //dd(Auth::guard('admin')->user());
        return view('admin.admin_profile_view', compact('adminData'));
    } // end method


    public function edit()
    {

        $id = Auth::guard('admin')->id();
        $editData = Admin::find($id);
        return view('admin.admin_profile_edit', compact('editData'));
    }


    public function store(Request $request)
    {

        $id = Auth::guard('admin')->id();
        $data = Admin::find($id);
        $data->name = $request->name;
        $data->email = $request->email;

        if ($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/admin_images/'.$data->profile_photo_path));

            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$filename);
            $data['profile_photo_path'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.profile')->with($notification);
    }


    public function passwordChange()
    {
        return view('admin.admin_change_password');
    }


    public function updatePassword(Request $request)
    {
        $validateData = $request->validate([
            'password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required|same:new_password',
        ]);

        $hashedPassword = Auth::guard('admin')->user()->password;

        if (Hash::check($request->password,$hashedPassword)){
            $id = Auth::guard('admin')->id();
            $user = Admin::find($id);

            $user->password = bcrypt($request->new_password);
            $user->save();

            session()->flash('message', 'Password Updated Successfully');

            return redirect()->back();
        }else{
            session()->flash('message', 'Current password is not match');

            return redirect()->back();
        }
    } // end method


    public function registerView()
    {
        return view('auth.admin_register');
    }


    public function createAdminn(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        Admin::insert([
                'name' => $request->name,
                'email' => $request->email ,
                'password' => Hash::make($request->password),
            ]);

            $notification = array(
                'message' => 'New Admin has been create Successfully',
                'alert-type' => 'success'
            );

        return redirect()->back();
    }
























}









































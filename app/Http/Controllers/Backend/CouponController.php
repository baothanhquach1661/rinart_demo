<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use Image;
use Carbon\Carbon;

class CouponController extends Controller
{
    public function setting()
    {
        $coupons = Coupon::orderBy('id', 'DESC')->get();

        return view('backend.coupon.index', compact('coupons'));
    }


    public function create()
    {
        $coupons = Coupon::orderBy('id', 'DESC')->get();

        return view('backend.coupon.create', compact('coupons'));
    }


    public function store(Request $request)
    {

        Coupon::insert([
            'coupon_name' => strtoupper($request->coupon_name),
            'coupon_detail' => $request->coupon_detail,
            'discount_percentage' => $request->discount_percentage,
            'discount_regular' => $request->discount_regular,
            'coupon_validity' => $request->coupon_validity,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Coupon Code has been Created',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.coupon.index')->with($notification); 

    } // end  method


    public function edit($id)
    {
        $coupons = Coupon::findOrFail($id);

        return view('backend.coupon.edit', compact('coupons'));
    }


    public function update(Request $request)
    {
        $coupon_id = $request->id;

        Coupon::findOrFail($coupon_id)->update([
            'coupon_name' => strtoupper($request->coupon_name),
            'coupon_detail' => $request->coupon_detail,
            'discount_percentage' => $request->discount_percentage,
            'discount_regular' => $request->discount_regular,
            'coupon_validity' => $request->coupon_validity,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Coupon code Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('admin.coupon.index')->with($notification); 

    } // end method


    public function delete($id)
    {
        Coupon::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Coupon Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification); 
    }














































}

















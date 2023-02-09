<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShippingDivision;
use App\Models\ShippingDistrict;
use App\Models\ShippingState;
use Carbon\Carbon;


class ShippingController extends Controller
{
    public function setting()
    {
        $divisions = ShippingDivision::orderBy('id', 'DESC')->get();

        return view('backend.shipping.division.division_setting', compact('divisions'));
    }


    public function create()
    {
        $divisions = ShippingDivision::orderBy('id', 'DESC')->get();

        return view('backend.shipping.division.create', compact('divisions'));
    }


    public function store(Request $request)
    {
        
        ShippingDivision::insert([
            'division_area_name' => $request->division_area_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Division Successfully Created',
            'alert-type' => 'success'
        );

        return redirect()->route('manage-shipping-division')->with($notification); 

    } // end  method


    public function edit($id)
    {
        $divisions = ShippingDivision::findOrFail($id);

        return view('backend.shipping.division.edit', compact('divisions'));
    }


    public function update(Request $request)
    {
        $division_id = $request->id;

        ShippingDivision::findOrFail($division_id)->update([
            'division_area_name' => $request->division_area_name,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Division Area Name Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('manage-shipping-division')->with($notification); 

    } // end method


    public function delete($id)
    {
        ShippingDivision::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Division Area Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification); 
    }


    // -----------  shipping district  ------------//

    public function districtIndex()
    {
        $divisions = ShippingDivision::orderBy('division_area_name', 'ASC')->get();
        $districts = ShippingDistrict::with('division')->orderBy('id', 'DESC')->get();

        return view('backend.shipping.district.district_setting', compact('districts', 'divisions'));
    }


    public function districtCreate()
    {
        $divisions = ShippingDivision::orderBy('id', 'DESC')->get();

        return view('backend.shipping.district.create', compact('divisions'));
    }


    public function districtStore(Request $request)
    {
        
        ShippingDistrict::insert([
            'division_id' => $request->division_id,
            'district_name' => $request->district_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'District Successfully Created',
            'alert-type' => 'success'
        );

        return redirect()->route('manage-shipping-district')->with($notification); 

    } // end  method


    public function districtEdit($id)
    {
        $divisions = ShippingDivision::orderBy('division_area_name', 'ASC')->get();
        $district = ShippingDistrict::findOrFail($id);

        return view('backend.shipping.district.edit', compact('district', 'divisions'));
    }


    public function districtUpdate(Request $request, $id)
    {

        ShippingDistrict::findOrFail($id)->update([
            'division_id' => $request->division_id,
            'district_name' => $request->district_name,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'District Area Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('manage-shipping-district')->with($notification); 

    } // end method


    public function districtDelete($id)
    {
        ShippingDistrict::findOrFail($id)->delete();

        $notification = array(
            'message' => 'District Area Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification); 
    }

    // -----------  end shipping district  ------------//



    // -----------  shipping state  ------------//

    public function stateIndex()
    {
        $divisions = ShippingDivision::orderBy('division_area_name', 'ASC')->get();
        $districts = ShippingDistrict::orderBy('district_name', 'ASC')->get();
        $states = ShippingState::with('division', 'district')->orderBy('id', 'DESC')->get();

        return view('backend.shipping.state.state_setting', compact('districts', 'divisions', 'states'));
    }


    public function stateCreate()
    {
        $divisions = ShippingDivision::orderBy('division_area_name', 'ASC')->get();
        $districts = ShippingDistrict::orderBy('district_name', 'ASC')->get();
        $states = ShippingState::orderBy('id', 'DESC')->get();

        return view('backend.shipping.state.create', compact('districts', 'divisions', 'states'));
    }


    public function stateStore(Request $request)
    {
        
        ShippingState::insert([
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'state_name' => $request->state_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'State Successfully Created',
            'alert-type' => 'success'
        );

        return redirect()->route('manage-shipping-state')->with($notification); 

    } // end  method


    public function stateEdit($id)
    {
        $divisions = ShippingDivision::orderBy('division_area_name', 'ASC')->get();
        $districts = ShippingDistrict::orderBy('district_name', 'ASC')->get();
        $states = ShippingState::findorfail($id);

        return view('backend.shipping.state.edit', compact('districts', 'divisions', 'states'));
    }


    public function statetUpdate(Request $request, $id)
    {

        ShippingState::findOrFail($id)->update([
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'state_name' => $request->state_name,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'State Area Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('manage-shipping-state')->with($notification); 

    } // end method


    public function stateDelete($id)
    {
        ShippingState::findOrFail($id)->delete();

        $notification = array(
            'message' => 'State Area Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification); 
    }



    // -----------  end shipping district  ------------//













}



















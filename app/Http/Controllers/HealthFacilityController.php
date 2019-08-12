<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HealthFacility;
use Validator;
use Session;

class HealthFacilityController extends Controller
{
    public function create(){
        return view('admin.facility.create');
    }

    public function store(Request $request){
        
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'location' => 'required',
            'district' => 'required'
        ]);

        if($validator->fails()){
            return redirect()->back();
        }

        $health_facility = new HealthFacility;

        $health_facility->name = $request->name;
        $health_facility->location = $request->location;
        $health_facility->district = $request->district;

        $health_facility->save();

        Session::flash('success', 'Health Facility Added Successfully');

        return redirect()->route('facility_lists');

    }

    public function index () {

        $health_facilities = HealthFacility::all();

        return view('admin.facility.index', compact('health_facilities'));
    }
}

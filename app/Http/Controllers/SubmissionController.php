<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Submission;
use Session;
use Sentinel;

class SubmissionController extends Controller
{
	public function store(Request $request){

		// dd($request->all());

		$this->validate($request, [
			'patient_name' => 'required',
			'phy_surg' => 'required',
			'patient_age' => 'required',
			'gender' => 'required',
			'patient_number' => 'required',
			'health_unit' => 'required',
			'village_zone' => 'required',
			'parish' => 'required',
			'sub_county' => 'required',
			'district' => 'required',
			'nature_specimen' => 'required',
			'date_of_request' => 'required',
			'date_of_reciept' => 'required'
		]);

		$submission = new Submission;

		$submission->patient_name = $request->patient_name;
		$submission->phy_or_surg = $request->phy_surg;
		$submission->age = $request->patient_age;
		$submission->gender = $request->gender;
		$submission->patient_number = $request->patient_number;
		$submission->health_unit = $request->health_unit;
		$submission->village_or_zone = $request->village_zone;
		$submission->parish = $request->parish;
		$submission->sub_county = $request->sub_county;
		$submission->district = $request->district;
		$submission->user_id = Sentinel::getUser()->id;
		$submission->nature_of_specimen = $request->nature_specimen;
		$submission->date_of_request = $request->date_of_request;
		$submission->date_of_reciept = $request->date_of_reciept;

		$submission->save();

		Session::flash('success', 'A New Case Added Successfully');

		return redirect()->back();

	}
}

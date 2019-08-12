<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Session;
use App\Treatment;
use PDF;

class TreatmentController extends Controller
{
	public function records(Request $request){

		$validator = Validator::make($request->all(), [
			'patient_id' => 'required',
			'nature_of_specimen' => 'required',
			'clinical_summary' => 'required',
			'macrosocopic_appearance' => 'required',
			'microsocopic_appearance' => 'required',
			'conclusion' => 'required'
		]);

		if($validator->fails()){
			return redirect()->back();
		}

		$treatment = new Treatment;
		$treatment->patient_id = $request->patient_id;
		$treatment->nature_of_specimen = $request->nature_of_specimen;
		$treatment->clinical_summary = $request->clinical_summary;
		$treatment->macrosocopic_appearance = $request->macrosocopic_appearance;
		$treatment->microsocopic_appearance = $request->microsocopic_appearance;
		$treatment->conclusion = $request->conclusion;
		$treatment->recorded_at = now();

		$treatment->save();

		Session::flash('success', 'A New Medical Record Added Successfully');

		return redirect()->back();

	}

	public function treatment_lists () {

		$treatments = Treatment::orderBy('id', 'DESC')->get();

		return view('admin.treatments.treatment_list', compact('treatments'));

	}

	public function medical_report($id) {

		$treatment = Treatment::findOrFail($id);


		$patient = $treatment->patient;

		$pdf = PDF::loadView('admin.reports.medical_report', ['treatment' => $treatment, 'patient' => $patient]);
		return $pdf->stream('invoice.pdf');
	}
}

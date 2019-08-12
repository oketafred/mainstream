<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use Sentinel;
use Session;
use Validator;
use Image;
use Alert;

class PatientController extends Controller
{
	public function getAllPatient() {

		$patients = Patient::orderBy('id', 'DESC')->get();

		// dd($patients);

		return view('clinicans.patients.index', compact('patients'));

	}

	public function searchPatient(Request $request) {

		// dd($request->all());

		// $builder = Patient::all();

            // get the search term if any
		$searchTerm = $request->get('searchTerm');
		$filters = $request->get('filters') ?: [];
		if ($searchTerm) {
			$builder = Patient::where('patient_code', 'LIKE', '%' . $searchTerm . '%');
			foreach ($filters as $key => $value) {
				if ($key != 'patient_code') {
					if ($key == 'email' || $key == 'phone' ) {
						$builder = Patient::where($key, 'LIKE', '%' . $searchTerm . '%');
					} else {
						$builder = Patient::orWhere($key, 'LIKE', '%' . $searchTerm . '%');
					}
				}
			}
		}

		$patients = $builder->get();

		// Alert::success('Success Title', 'Success Message');

		return view('admin.patients.index', compact('patients'));

	}


	public function searchPatientClinicans(Request $request) {

		// dd($request->all());

		// $builder = Patient::all();

            // get the search term if any
		$searchTerm = $request->get('searchTerm');
		$filters = $request->get('filters') ?: [];
		if ($searchTerm) {
			$builder = Patient::where('patient_code', 'LIKE', '%' . $searchTerm . '%');
			foreach ($filters as $key => $value) {
				if ($key != 'patient_code') {
					if ($key == 'email' || $key == 'phone' ) {
						$builder = Patient::where($key, 'LIKE', '%' . $searchTerm . '%');
					} else {
						$builder = Patient::orWhere($key, 'LIKE', '%' . $searchTerm . '%');
					}
				}
			}
		}

		$patients = $builder->get();

		// dd($patients);

		// Alert::success('Success Title', 'Success Message');

		return view('clinicans.patients.index', compact('patients'));

	}

	public function create(){

		$patients = Patient::orderBy('id', 'DESC')->get();

		return view('admin.patients.index', compact('patients'));

	}

	public function show($id){

		$patient = Patient::where('patient_code', $id)->first();

		// dd($patient);

		$documents = $patient->documents()->latest()->get();

		$treatments = $patient->treatments()->latest()->get();

		return view('admin.patients.show', compact('patient', 'documents', 'treatments'));

	}

	public function add_patient(Request $request) {

		// dd($request->all());

		$patient = new Patient;

		$patient->patient_code = $this->generatePatientCode();
		$patient->first_name = $request->get('first_name');
		$patient->middle_name = $request->get('middle_name');
		$patient->last_name = $request->get('last_name');
		$patient->gender = $request->get('gender');
		$patient->dob = $request->get('dob');
		$patient->blood_group = $request->get('blood_group');
		$patient->nid_number = $request->get('nid_number');
		$patient->passport_number = $request->get('passport_number');
		$patient->marital_status = $request->get('marital_status');
		$patient->phone = $request->get('phone');
		$patient->email = $request->get('email');
		$patient->nationality = $request->get('nationality');

		$patient->village_zone = $request->get('village_zone');
		$patient->parish = $request->get('parish');
		$patient->subcounty = $request->get('subcounty');
		$patient->district = $request->get('district');

		$patient->save();

		// Session::flash('success', 'Patient Created Successfully');
		// Alert::message("Robots are working!");

		return redirect()->route('patients.list');

	}

	public function add_patient_clinicans(Request $request) {

		// dd($request->all());

		$patient = new Patient;

		$patient->patient_code = $this->generatePatientCode();
		$patient->first_name = $request->get('first_name');
		$patient->middle_name = $request->get('middle_name');
		$patient->last_name = $request->get('last_name');
		$patient->gender = $request->get('gender');
		$patient->dob = $request->get('dob');
		$patient->blood_group = $request->get('blood_group');
		$patient->nid_number = $request->get('nid_number');
		$patient->passport_number = $request->get('passport_number');
		$patient->marital_status = $request->get('marital_status');
		$patient->phone = $request->get('phone');
		$patient->email = $request->get('email');
		$patient->nationality = $request->get('nationality');

		$patient->village_zone = $request->get('village_zone');
		$patient->parish = $request->get('parish');
		$patient->subcounty = $request->get('subcounty');
		$patient->district = $request->get('district');

		$patient->save();

		// dd($patient);
		
		Session::flash('success', 'Patient Created Successfully');
		// Alert::message("Robots are working!");
		// alert()->success('You have been logged out.', 'Good bye!');

		return redirect()->back();

	}

	public function generatePatientCode()
	{
		$user = Sentinel::getUser();
		// $initials = strtoupper($user->first_name[0] . '' . $user->last_name[0]);
		$count = Patient::count() + 1;
		if ($count < 10) {
			$c = '000' . $count;
		} elseif ($count >= 10 && $count < 100) {
			$c = '00' . $count;
		} elseif ($count >= 100 && $count < 1000) {
			$c = '0' . $count;
		} else {
			$c = $count;
		}
		return 'MBC' . date('Ymd') . '_' . $c;
	}


	public function patient_avatar(Request $request, $id){

		$patient = Patient::where('id',$id)->first();
		// dd($request->hasFile('avatar'));
		if ($request->hasFile('avatar') && $patient) {
			// dd($request->all());
			$avatar = $request->file('avatar');
			$file = array('avatar' => $avatar);
			$rules = array('avatar' => 'required|mimes:jpeg,jpg,bmp,png');
			$validator = Validator::make($file, $rules);
			if ($validator->fails()) {
				Session()->flash('warning', 'Check your File Type');
				return redirect()->back()->withInput()->withErrors($validator);
			} else {
				$fileName = md5($avatar->getClientOriginalName() . '_' . now()) . '.png';
				$filePath = 'uploads/user-images/' . $fileName;
				$image = Image::make($avatar->getRealPath());
				if($image->height() > 215 || $image->width() > 215){
					$image->resize(215, 215);
				}
				$image->save($filePath);

				$patient->avatar = $fileName;

				$patient->update();
				session()->flash('success','Uploaded file!');
				return redirect()->back();
			}
		}
		Session()->flash('error','Failed to upload file!');

		return redirect()->back();
	}

}

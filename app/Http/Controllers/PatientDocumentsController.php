<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\PatientDocuments;
use Session;
use Validator;
use Image;

class PatientDocumentsController extends Controller
{
	public function documents (Request $request) {

		try {
            //dd($request->all());
			$validator = Validator::make($request->all(), [
				'patient_id' => 'required',
				'documents' => 'required',
				'documents.*' => 'mimes:jpeg,jpg,bmp,png,pdf|max:2048',
				'description' => 'required',
			]);
			if ($validator->fails()) {
				Session()->flash('warning', trans('general.validation_error'));
				return redirect()->back()->withInput()->withErrors($validator);
			}

			$id = $request->get('patient_id');
			if ($request->hasFile('documents') && $patient = Patient::where('patient_code', $id)->first()) {
				$documents = $request->file('documents');
				foreach ($documents as $file) {
					$extension = $file->getClientOriginalExtension();
					$fileName = md5($file->getClientOriginalName() . '_' . now()) . '.' . $extension;
					$filePath = 'uploads/documents/' . $fileName;
					if (!is_dir('uploads/documents')) {
						mkdir('uploads/documents', 0755, true);
					}
					$file->move('uploads/documents',$fileName);

					PatientDocuments::create([
						'patient_id' => $patient->id,
						'path' => asset($filePath),
						'description' => $request->get('description'),
						'uploaded_at' => now(),
					]);
				}
				Session()->flash('success', 'Patient documents uploaded!');
				return redirect()->back();
			}

			Session()->flash('error', 'Unknown patient with ID ' . $id);
			return redirect()->back()->exceptInput();

		} catch (Exception $ex) {
			Session()->flash('error', $ex->getMessage());
			// session()->flash('success', 'Documents uploaded!');
			return redirect()->back()->withInput();
		}
	}

}	

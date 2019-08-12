<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{

	protected $dates = ['dob'];


	// protected $fillables = ['avatar'];

	public function age(){
		$age = $this->dob->diffInYears(now());
		if($age > 0){
			return $age . ' years';
		}
		return $this->dob->diffInDays(now()) .' days';
	}


	public function documents(){
		return $this->hasMany(PatientDocuments::class,'patient_id');
	}

	public function treatments(){
		return $this->hasMany(Treatment::class,'patient_id');
	}

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientDocuments extends Model
{

	protected $dates = ['uploaded_at'];

	protected $fillable = [
		'patient_id', 'uploaded_at', 'path', 'description'
	];

	public function patient(){

		return $this->belongsTo(Patient::class);

	}
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{

	protected $dates = ['recorded_at'];

	protected $fillable = [
		'patient_id', 'clinical_summary', 'macrosocopic_appearance', 'microsocopic_appearance', 'conclusion'
	];

	public function patient(){
		return $this->belongsTo(Patient::class);
	}
}

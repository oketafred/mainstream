<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
	protected $fillable = [
		'submission_id', 'report'
	];


	public function submission () {

		return $this->belongsTo(Submission::class);
		
	}
}

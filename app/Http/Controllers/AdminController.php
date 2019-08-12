<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use App\HealthFacility;
use App\User;
use App\Clinican;
use App\Patient;
use App\Treatment;

class AdminController extends Controller
{
	public function admin () {

		$health_facilities_count = HealthFacility::count();

		$clinicans_count = Sentinel::findRoleBySlug('clinican')->users()->with('roles')->count();

		$patients_count = Patient::count();

		$treatments_count = Treatment::count();

		$first_pie_chart = [
			'groups' => ['Health Facilities', 'Clinicans'],
			'data' => [$health_facilities_count, $clinicans_count]
		];

		$second_pie_chart = [
			'groups' => ['Total Patients', 'Total Number of Treatment'],
			'data' => [$patients_count, $treatments_count]
		];

		// dd($first_pie_chart);

		return view('admin.admin_dashboard', compact('health_facilities_count', 'clinicans_count', 'patients_count', 'treatments_count', 'first_pie_chart', 'second_pie_chart'));
	}

}

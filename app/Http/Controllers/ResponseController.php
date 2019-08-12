<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Submission;
use App\Response;
use Sentinel;
use Session;
use Image;

class ResponseController extends Controller
{
	public function index(){

		$submissions = Submission::orderBy('id', 'desc')->get();

		// dd($submissions);


		return view('admin.submissions.submission_lists', compact('submissions'));
	}

	public function detail_submission($id){

		$submission_detail = Submission::findOrFail($id);

		// dd($submission_detail);
		
		// $submission_detail_more = DB::table('users')
		// ->leftjoin('submissions', 'users.id', '=', 'submissions.user_id')
		// ->join('responses', 'submissions.id', '=', 'responses.submissions_id')
		// ->select('users.*', 'submissions.*', 'responses.*')
		// ->first();

		// $submission_detail_more = $submission_detail->response();

		// dd($submission_detail_more);

		return view('admin.submissions.submission_detail', compact('submission_detail'));

	}

	public function getAllResponse(){

		$responses = DB::table('users')
		->join('submissions', 'users.id', '=', 'submissions.user_id')
		->join('responses', 'submissions.id', '=', 'responses.submissions_id')
		->where('users.id', Sentinel::getUser()->id)
		->select('users.*', 'submissions.*', 'responses.*')
		->get();

		// dd($responses);

		return view('clinicans.clinican_response', compact('responses'));

	}

	public function responseDetail ($id){

		$response_detail = DB::table('users')
		->join('submissions', 'users.id', '=', 'submissions.user_id')
		->join('responses', 'submissions.id', '=', 'responses.submissions_id')
		->where('users.id', Sentinel::getUser()->id)
		->where('submissions.id', $id)
		->select('users.*', 'submissions.*', 'responses.*')
		->first();

		// dd(asset('uploads/reports/'. $response_detail->report));

		return view('clinicans.clinican_response_detail', compact('response_detail'));

	}

	// public function viewReport ($report){

	// 	$report = DB::table('users')
	// 	->join('submissions', 'users.id', '=', 'submissions.user_id')
	// 	->join('responses', 'submissions.id', '=', 'responses.submissions_id')
	// 	->where('users.id', Sentinel::getUser()->id)
	// 	->where('submissions.id', $report)
	// 	->select('users.*', 'submissions.*', 'responses.*')
	// 	->first();


	// 	// dd($report->report);
	// 	$headers = ['Content-Type: application/pdf'];

	// 	return response()->download("uploads/reports/" . $report->report, $report->report, $headers);

	// 	// return response()->file('/uploads/reports/' . $report->report);

	// }
	

	public function send_report(Request $request){

		// dd($request->all());

		$image= $request->file('report');

		$filename = time(). '.' .$image->getClientOriginalExtension();

		$image->move('uploads/reports/', $filename);

		$report = new Response;

		$report->submissions_id = $request->submission_id;
		$report->report = $filename;

		$report->save();

		Session::flash('success', 'Report Submitted Successfully');

		return redirect()->back();

	}
}

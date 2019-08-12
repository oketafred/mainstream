<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Sentinel;
use Session;
use Validator;
use Image;
use App\Submission;
use App\HealthFacility;
use App\User;

class ClinicanController extends Controller
{
  public function submissions (){

    $submissions = Submission::orderBy('id', 'desc')->where('user_id', '=', Sentinel::getUser()->id)->get();

    $user_login = Sentinel::getUser()->id;

    $health_facility = DB::table('health_facilities')
    ->join('users', 'health_facilities.id', '=', 'users.health_facility_id')
    ->where('users.id', $user_login)
    ->select('users.*', 'health_facilities.*')
    ->first();


    // dd($health_facility->name);

    return view('clinicans.clinican_dashboard', compact('submissions', 'health_facility'));

  }


  public function detail_submission ($id){

    $submission_detail = Submission::findOrFail($id);

    return view('clinicans.clinican_submission_detail', compact('submission_detail'));

  }

  public function create () {

    $health_facilities = HealthFacility::all();

    return view('admin.doctors.create', compact('health_facilities'));
  }

  public function index () {

    // $clinicans = Sentinel::findRoleBySlug('clinican')->users()->with('roles')->get();

    $clinicans = DB::table('users')
    ->join('health_facilities', 'users.health_facility_id', '=', 'health_facilities.id')
    ->select('users.*', 'health_facilities.*')
    ->orderBy('users.id', 'desc')
    ->get();

    // dd($clinicans);

    return view('admin.doctors.index', compact('clinicans'));
  }

  public function store(Request $request){

    $validator = Validator::make($request->all(), [
      'email'    => 'required|email|unique:users,email',
      'first_name' => 'required',
      'last_name' => 'required',
      'password' => 'required',
      'address' => 'required',
      'telephone_number' => 'required',
      'health_facility_id' => 'required',
      'specialist' => 'required',
      'photo' => 'required',
      'gender' => 'required'
    ]);
    
    if ($validator->fails()) {

      Session::flash('error', 'Please Check your Inputs');

      return redirect()->back();
    }

    $image= $request->file('photo');

    $filename = time(). '.' .$image->getClientOriginalExtension();
    $location = public_path('clinican_photos/' . $filename);
    Image::make($image)->resize(800, 400)->save($location);
    $clinican_photo = $filename;

    $credentials = [
      'email'    => $request->email,
      'first_name' => $request->first_name,
      'last_name' => $request->last_name,
      'password' => $request->password,
      'address' => $request->address,
      'telephone_number' => $request->telephone_number,
      'health_facility_id' => $request->health_facility_id,
      'specialist' => $request->specialist,
      'photo' => $clinican_photo,
      'gender' => $request->gender,
      'biography' => $request->biography
    ];

    $user = Sentinel::registerAndActivate($credentials);

    $role = Sentinel::findRoleBySlug("clinican");

    $role->users()->attach($user);

    Session::flash('success', 'A New Clinican Added Successful.');

    return redirect()->route('clinican_lists');
  }

}

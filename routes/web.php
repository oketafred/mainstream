<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Visitors Route
Route::group(['middleware' => 'visitors'], function(){
  Route::get('/', 'AccountController@getLogin')->name('login');
  Route::post('login', 'AccountController@processLogin')->name('login');
  Route::get('forgot_password', function () {
    return view('forgot_password');
  })->name('forgot_password');
});

// Logout Route
Route::post('logout', 'AccountController@logout')->name('logout');


// Clinicans
Route::group(['prefix' => 'clinican', 'middleware' => 'clinicans'], function(){


  Route::post('patients', 'PatientController@searchPatientClinicans')->name('patient.clinicans.search');

  Route::post('add_patient', 'PatientController@add_patient_clinicans')->name('patient_clinicans.add');

  Route::get('patients', 'PatientController@getAllPatient')->name('patients');

  Route::get('clinican_submission', 'ClinicanController@submissions')->name('clinican_submission');

  Route::get('clinican_submission_detail/{id}', 'ClinicanController@detail_submission')->name('clinican_submission_detail');

  Route::get('clinican_response', 'ResponseController@getAllResponse')->name('clinican_response');

  Route::get('clinican_response_detail/{id}', 'ResponseController@responseDetail')->name('clinican_response_detail');

  // Route::get('view_report/{report_id}', 'ResponseController@viewReport')->name('view_report');


  Route::post('store_clinican_submission', 'SubmissionController@store')->name('store_clinican_submission');

  Route::get('profile', 'PasswordController@clinicanEdit')->name('clinican_profile');

  Route::post('resetpasswordcomplete', 'PasswordController@ClinicanUpdate')->name('clinican.reset.password.complete');

});





// Admin Roles
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function(){
  Route::get('admin_dashboard', 'AdminController@admin')->name('admin_dashboard');

  Route::get('facility_lists', 'HealthFacilityController@index')->name('facility_lists');

  Route::get('create_facility', 'HealthFacilityController@create')->name('create_facility');

  Route::post('store_facility', 'HealthFacilityController@store')->name('store_facility');

  Route::get('clinican_lists', 'ClinicanController@index')->name('clinican_lists');

  Route::get('create_clinican', 'ClinicanController@create')->name('create_clinican');

  Route::post('store_clinican', 'ClinicanController@store')->name('store_clinican');

  Route::get('admin_response', 'ResponseController@index')->name('admin_response');
  Route::post('send_report', 'ResponseController@send_report')->name('send_report');

  Route::get('submission_detail/{id}', 'ResponseController@detail_submission')->name('submission_detail');

  Route::get('add_patient', 'ResponseController@add_patient')->name('add_patient');

  Route::get('history', 'ResponseController@history')->name('history');

  Route::get('patients_list', 'PatientController@create')->name('patients.list');

  Route::post('add_patient', 'PatientController@add_patient')->name('patient.add');

  Route::get('patient/{id}', 'PatientController@show')->name('patient.show');

  Route::post('patient/{id}', 'PatientController@patient_avatar')->name('patient_avatar');

  Route::post('search_patient', 'PatientController@searchPatient')->name('patient.search');

  Route::get('treatment_lists', 'TreatmentController@treatment_lists')->name('treatment_lists');

  Route::post('records', 'TreatmentController@records')->name('records');

  Route::get('medical_report/{id}', 'TreatmentController@medical_report')->name('medical_report');



  Route::post('documents', 'PatientDocumentsController@documents')->name('documents');

  Route::get('profile', 'PasswordController@edit')->name('admin_profile');

  Route::post('resetpasswordcomplete', 'PasswordController@update')->name('reset.password.complete');

});

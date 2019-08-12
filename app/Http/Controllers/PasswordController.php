<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use Session;

class PasswordController extends Controller
{
	public function edit() {

		return view('admin.profile.admin_profile');

	}

	public function clinicanEdit() {

		return view('clinicans.profile.clinician_profile');

	}

	public function update(Request $request) {
		$hasher = Sentinel::getHasher();

		$oldPassword = $request->old_password;
		$password = $request->password;
		$passwordConf = $request->password_confirmation;

		$user = Sentinel::getUser();

		if (!$hasher->check($oldPassword, $user->password) || $password != $passwordConf) {
			Session::flash('error', 'Check input is correct.');

			return redirect()->route('admin_profile');
		}

		Sentinel::update($user, array('password' => $password));

		Sentinel::logout();

		Session::flash('success', 'Password updated successfully. Please Login');

		return redirect('/');
	}

	public function ClinicanUpdate(Request $request) {

		$hasher = Sentinel::getHasher();

		$oldPassword = $request->old_password;
		$password = $request->password;
		$passwordConf = $request->password_confirmation;

		$user = Sentinel::getUser();

		if (!$hasher->check($oldPassword, $user->password) || $password != $passwordConf) {
			Session::flash('error', 'Check input is correct.');

			return redirect()->route('admin_profile');
		}

		Sentinel::update($user, array('password' => $password));

		Sentinel::logout();

		Session::flash('success', 'Password updated successfully. Please Login');

		return redirect('/');
	}
}

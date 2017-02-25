<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Practice;
use \App\Doctor;



class DoctorController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}

	public function index(){

		$practices = Practice::all();
		$doctors = Doctor::all();
		return view("dashboard.doctors", compact('practices', 'doctors'));
	}

	public function create(){

		$this->validate(request(), ['fullname' => 'required','practice' => 'required']);

		if(!Doctor::isUnique(request())){

			return back()->withErrors(array(
				'message' => 'Duplicate doctors not allowed. Please ensure uniqueness.'
				));

		} else {
			Doctor::create([
				'fullname' => request('fullname'),
				'practice_id' => request('practice')
				]);

		}

		return back();

	}

	public function destroy(Doctor $doctor)
	{
		$doctor->delete();
		return back();
	}

	public function destroyMany(){

		foreach(request('doctors') as $id => $checkState)
			Doctor::destroy($id);

		return back();



	}
}

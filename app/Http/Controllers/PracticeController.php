<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Practice;

class PracticeController extends Controller
{

	public function __construct(){
		$this->middleware('auth');
	}

	public function index(){

		$practices = Practice::all();
		return view('dashboard.practices', compact('practices'));
	}

	public function create(){

		$this->validate(request(), ['name' => 'required|min:2']);

		if (Practice::where('name', '=', request('name'))->exists()) {
			return back()->withErrors(array(

				'message' => 'Duplicate practice names are not allowed.'

				));
		}

		dd("It's foyne..");

		Practice::create([
			'name' => trim(request('name')),
			'address' => trim(request('address')),
			'postcode' => trim(request('postcode')),
			'telephone' => trim(request('telephone')),
			]);

		return redirect('/practices');

	}
}

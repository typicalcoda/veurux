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

		Practice::create([
			'name' => request('name'),
			'address' => request('address'),
			'postcode' => request('postcode'),
			'telephone' => request('telephone'),
			]);

		return redirect('/practices');

	}
}

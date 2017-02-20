<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Pickup;
class PickupController extends Controller
{	
	public function __construct(){
		$this->middleware('auth');
	}

	public function index(){
		$doctors = \App\Doctor::all();
		$pickups = Pickup::all();
		$practices = \App\Practice::all();
		return view('dashboard.pickups', ['doctors' => $doctors, 'pickups' => $pickups, 'practices' => $practices]);
	}

	public function create(){

		$this->validate(request(),[

			'fullname' => 'required',
			'address' => 'required',
			'doctor' => 'required',
			'collection_date' => 'required'

			]);


		Pickup::create([
			'client_id' => \App\Client::create([
				'fullname' => request('fullname'),
				'dob' => request('dob'),
				'address' => request('address'),
				'postcode' => request('postcode'),
				'telephone' => request('telephone')
				])->id,
			'doctor_id' => \App\Doctor::where('id','=',request('doctor'))->value('id'),
			'repeat' => request('repeat'),
			'no_items' => request('no_items'),
			'originator' => request('originator'),
			'collection_date' => request('collection_date'),
			'instructions' => request('instructions')
			]);

		return back();
	}
}

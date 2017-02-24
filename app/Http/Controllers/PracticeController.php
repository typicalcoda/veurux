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


		Practice::create([
			'name' => trim(request('name')),
			'address' => trim(request('address')),
			'postcode' => trim(request('postcode')),
			'telephone' => trim(request('telephone')),
			]);

		return redirect('/practices');
	}

	public function destroy(Practice $practice){

		$practice->delete();

		return back();
	}


	//multi-checked deletion
	public function destroyMany(){
		
		$ids = request('practices');

		foreach ($ids as $id => $checkValue) {
			
			//delete all practices;
			Practice::destroy($id);
		}

		return back();
		

	}
}

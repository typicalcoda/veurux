<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{

	public function __construct(){
		$this->middleware('guest', ['except' => 'destroy']);
	}

	public function index(){
		return view('sessions.login');
	}

	public function create()
	{
		if(!auth()->attempt(request(['email','password']))){

			return back()
			->withErrors(array('message' => 'Incorrect credentials'));

		} 


		return redirect('/');
		
	}

	public function destroy(){
		
		auth()->logout();
		return redirect('/');

	}
}

<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AutenticacionController extends Controller
{
	public function __construct()
	{
		$this->middleware('guest',['except'=>'logout']);
	}

    public function showLoginForm(){
    	return view('login');
    }

    public function login(Request $request)
    {
    	$this->validate($request,[
    		'email' => 'required|email|exists:users',
    		'password'=> 'required|min:6'
    	]);

    	if (Auth::attempt(['email'=>$request->email,'password'=>$request->password],
            $request->remember)) {
            //date_default_timezone_set("America/Lima");
    		return redirect()->intended(route('app.board'));
    	}

    	return redirect()->back()
            ->withInput($request->only('email','remember'));
        }
    

    public function logout(Request $request)
    {
		//\Session::forget('idPeriodoSeleccionado');
        Auth::logout();
        return redirect()->route('app.login.form');
    }
}

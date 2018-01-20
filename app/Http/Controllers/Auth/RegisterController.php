<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\RegisterUserRequest;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function registerForm(){
        return view('register');
    }

    protected function create(RegisterUserRequest $request)
    {
        $user = new User;
        $user->first_name = $request->first_name;
        $user->last_name  = $request->last_name;
        $user->email      = $request->email;
        $user->username   = $request->username;
        $user->password   = bcrypt($request->password);
        $user->photo      = 'img/default-user.png';
        $user->save();

        return redirect()->route('app.login');
    }
}

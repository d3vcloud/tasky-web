<?php

namespace App\Http\Controllers;

use App\Invite;
use App\User;

use App\Mail\SendInvitation;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

use App\Http\Requests\RegisterUserRequest;

class InviteController extends Controller
{
    public function send(Request $request)
    {
        if($request->ajax())
        {
            if(is_array($request->emails)){
                foreach ($request->emails as $email) {
                    if($this->isNotRegistred($email)){
                        $invite = $this->process($email);
                        if(!is_null($invite))
                            Mail::to($email)->send(new SendInvitation($invite));

                    }
                }
                return "Sent";
            }
        }
        return "error";
    }

    public function isNotRegistred($email)
    {
        $user = User::select('id')->where('email',$email)->first();
        if(is_null($user))
            return true;

        return false;
    }

    public function process($email)
    {
        do {
            $token = str_random(15);
        }while(Invite::where('token', $token)->first());

        $invite = new Invite;
        $invite->email = $email;
        $invite->token = $token;
        $invite->accepted = 0;
        //$invite->accepted_at = \Carbon\Carbon::now(\Session::get('timezone'))->toDateTimeString();
        if($invite->save())
            return $invite;

        return null;
    }

    public function accept($token)
    {
        $invite = Invite::where('token', $token)->first();
        if (is_null($invite) || $invite->accepted == 1){
            //if the invite doesn't exist do something more graceful than this
            abort(404);
        }

        $email = $invite->email;

        $invite->accepted = 1;
        $invite->accepted_at = \Carbon\Carbon::now(\Session::get('timezone'))->toDateTimeString();
        $invite->save();

        return view('register.userguest',compact('email'));
    }

    public function newUser(RegisterUserRequest $request)
    {
        $user = new User;
        $user->first_name = $request->first_name;
        $user->last_name  = $request->last_name;
        $user->email      = $request->email;
        $user->username   = $request->username;
        $user->password   = bcrypt($request->password);
        $user->photo      = '/img/default-user.png';
        $user->save();

        //return redirect()->route('app.login');
    }
}

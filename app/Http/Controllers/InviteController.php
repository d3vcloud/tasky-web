<?php

namespace App\Http\Controllers;

use App\Invite;
use App\Mail\SendInvitation;
use App\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class InviteController extends Controller
{
    public function send(Request $request)
    {
        if($request->ajax())
        {
            if(is_array($request->emails)){
                foreach ($request->emails as $email) {
                    if($this->isNotRegistred($email)){
                        Mail::to($email)->send(new SendInvitation());
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
            $token = str_random();//generate a random string using Laravel's str_random helper
        }while(Invite::where('token', $token)->first());//check if the token already exists and if it does, try again

        $invite = new Invite;
        $invite->email = $email;
        $invite->token = $token;
        $invite->accepted = 0;
        $invite->accepted_at = \Carbon\Carbon::now()->toDateTimeString();
        if($invite->save())
            return true;

        return false;
    }

    public function accept()
    {

    }

    public function generateUrl()
    {

    }
}

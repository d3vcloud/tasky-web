<?php

namespace App\Http\Controllers;

use App\Mail\SendInvitation;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class InvitationController extends Controller
{
    public function send(Request $request)
    {
        if($request->ajax())
        {
            if(is_array($request->emails)){
                Mail::to($request->emails)->send(new SendInvitation());
                return "Sent";
            }
        }
        return "error";
    }
}

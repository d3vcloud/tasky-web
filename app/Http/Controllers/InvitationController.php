<?php

namespace App\Http\Controllers;

use App\Mail\SendInvitation;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class InvitationController extends Controller
{
    public function send()
    {
        Mail::to('neils.alfaro@gmail.com')->send(new SendInvitation());
        return "Sent";
    }
}

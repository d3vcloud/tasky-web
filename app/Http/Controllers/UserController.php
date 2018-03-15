<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\User;
use Auth;

class UserController extends Controller
{
    public function uploadPhoto(Request $request)
    {
        $user = User::find(Auth::user()->id);
        if (!is_null($user)) {
            $request->file('file')->store('public/users/'.Auth::user()->id);
            $route = $request->file('file')->store('storage/users/'.Auth::user()->id);
            $user->photo = "/".$route;
            if ($user->save()){
                return response()->json([
                    "status" => "Uploaded",
                    "photo" => $user->photo
                ]);
            }
        }
        return "Error";
    }
}

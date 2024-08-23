<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $req)
    {
        $user = new User;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = hash::make($req->password);
        $user->save();

        return  $user ;
    }

     function login(Request $req)
    {
        $user = User::where('email', $req->email)->first();
        if(!$user || !Hash::check($req->password, $user->password))
        {
            return "Login failed";
        }
        return response()-> json(['message' => 'Logging successful', 'user' => $user],200);
    }
    function show()
    {
        return User::all();
    }
     function showuser($id)
    {
        $user = User::find($id);

        if ($user) {
            return response()->json($user, 200);
        } else {
            return response()->json(['error' => 'User not found'], 404);
        }
    }

    function update(Request $req, $id)
    {
        return "login API";
    }
}

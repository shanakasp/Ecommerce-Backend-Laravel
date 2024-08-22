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
        return $user;
    }
    function show()
    {
        return User::all();
    }
    function showuser($id)
    {
        return User::find($id);
    }
    function update(Request $req, $id)
    {
        return "login API";
    }
}

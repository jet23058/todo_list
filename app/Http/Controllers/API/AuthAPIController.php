<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthAPIController extends Controller
{
    public function __construct()
    {

    }

    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        $auth = ['username' => $username, 'password' => $password];
        return \JWTAuth::valid($auth) ? \JWTAuth::generate($auth) : "Invalid username or password";
    }

}

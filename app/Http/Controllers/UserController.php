<?php

namespace App\Http\Controllers;

use App\helper\UserService;
use App\helper\LoginService;
use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function register(Request $request)
    {
        $response = (new UserService($request->name, $request->email, $request->password, $request->contact, $request->country))->register($request->devicename);
        return response()->json($response);
    }
    public function login(Request $request)
    {
        $response = (new LoginService($request->email, $request->password))->login($request->devicename);
        return response()->json($response);
    }
}

<?php

namespace App\Http\Controllers;

use App\Core\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected function sendLoginResponse(Request $request)
    {
        $this->clearLoginAttempts($request);
        $user = $this->guard()->user();

        return response()->json([
            'api_token' => $user->api_token,
            'name' => $user->name,
            'email' => $user->email
        ]);
    }
}

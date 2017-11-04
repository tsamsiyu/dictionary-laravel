<?php

namespace App\Http\Controllers\Frontend;

use App\Core\Controller;

class UserController extends Controller
{
    public function self()
    {
        $user = auth()->user();
        return response()->json([
            'email' => $user->email,
            'name' => $user->name,
            'createdAt' => $user->created_at
        ]);
    }
}
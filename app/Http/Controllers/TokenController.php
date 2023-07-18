<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class TokenController extends Controller
{
    //
    public function refresh()
    {
        try {
            $token = JWTAuth::refresh();
        } catch (JWTException $e) {
            return response()->json(['error' => 'Failed to refresh token'], 500);
        }

        return response()->json(['token' => $token]);
    }
}

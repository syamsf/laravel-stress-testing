<?php

namespace App\Http\Controllers;

class DirectResponseController extends Controller
{
    public function __invoke()
    {
        return response()->json(['message' => 'User not found'], 200);
    }
}

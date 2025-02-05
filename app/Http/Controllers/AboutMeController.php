<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class AboutMeController extends Controller
{
    public function __invoke($id)
    {
        $user = DB::table('users')->where('id', $id)->first();

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        return response()->json($user);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class AboutMeCacheController extends Controller
{
    public function __invoke($id)
    {
        $user = Cache::remember("users{$id}", 600, function () use ($id)  {
            return DB::table('users')->where('id', $id)->first();
        });

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        return response()->json($user);
    }
}

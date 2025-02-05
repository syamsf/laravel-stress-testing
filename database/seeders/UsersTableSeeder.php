<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table("users")->truncate();

        $users = [];
        for ($i = 1; $i <= 1000000; $i++) {
            $users[] = [
                'name' => "User $i",
                'email' => "user$i@example.com",
                'password' => "user$i@example.com",
                'created_at' => now(),
                'updated_at' => now(),
            ];

            // Insert in batches of 1000 to avoid memory issues
            if ($i % 100 === 0) {
                DB::table('users')->insert($users);
                $users = [];
            }
        }

        // Insert any remaining users
        if (!empty($users)) {
            DB::table('users')->insert($users);
        }
    }
}

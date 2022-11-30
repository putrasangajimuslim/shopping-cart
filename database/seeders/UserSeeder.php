<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $checkUser = User::where('username', 'admin')->first();

        if (empty($checkUser)) {
            $user = User::create([
                'first_name' => 'Admin',
                'last_name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@admin.com',
                'phone_number' => '123456789',
                'user_level' => 'Admin',
                'password' => Hash::make('password'),
            ]);

        }

        $checkUser = User::where('username', 'user')->first();

        if (empty($checkUser)) {
            $user = User::create([
                'first_name' => 'user',
                'last_name' => 'user',
                'username' => 'user',
                'email' => 'user@admin.com',
                'phone_number' => '123456789',
                'user_level' => 'User',
                'password' => Hash::make('password'),
            ]);
        }
    }
}

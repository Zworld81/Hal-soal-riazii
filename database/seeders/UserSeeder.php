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
        User::create([
            'name' => "Full Admin",
            'phone_number' => "09383663723",
            'level' => 0,
            'referral_code' => 'abcd',
            'stars' => 100,
            'password' => Hash::make("12345678"),
        ]);
    }
}

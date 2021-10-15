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
            'phone_number' => "01234567899",
            'level' => 0,
            'password' => Hash::make("12345678"),
        ]);
    }
}

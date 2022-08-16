<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

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
            'name' => 'Mohamed Gharby',
            'email' => 'mohamed@gmail.com',
            'password' => bcrypt('12345'),
            'role_id' => 1,
            'access_token' => Str::random(30)
        ]);
    }
}

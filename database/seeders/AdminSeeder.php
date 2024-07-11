<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin1@gmail.com',
            'email_verified_at' => now(),
            'password' => ('password'),
            'remember_token' => Str::random(10),
        ])->assignRole('admin');
    }
}

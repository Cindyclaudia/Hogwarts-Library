<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin Hogwarts',
            'email' => 'admin@hogwarts.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Petugas Hogwarts',
            'email' => 'petugas@hogwarts.com',
            'password' => Hash::make('password'),
            'role' => 'petugas',
        ]);
    }
}
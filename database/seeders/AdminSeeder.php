<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Check if admin already exists
        if (!User::where('email', 'admin@pos.com')->exists()) {
            User::create([
                'name' => 'Admin',
                'email' => 'admin@pos.com',
                'password' => Hash::make('password123'), // choose a secure password
                'role' => 'admin',
            ]);
        }
    }
}

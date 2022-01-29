<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
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
            'name' => 'Admin',
            'mbiemri' => 'Admin',
            'email' => 'admin@gmail.com',
            'username' => 'admin',
            'verified' => 1,
            'password' => Hash::make('Admin123'),
            'created_at' => now(),
            'updated_at' => now(),
        ])->assignRole('Super Admin');

        User::create([
            'name' => 'user',
            'mbiemri' => 'user',
            'email' => 'user@gmail.com',
            'username' => 'user',
            'verified' => 0,
            'password' => Hash::make('User123'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

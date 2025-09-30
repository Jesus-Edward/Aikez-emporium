<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'name' => 'Zakor',
                'email' => 'zakor2004@gmail.com',
                'role' => 'admin',
                'password' => Hash::make('Password')
            ],
            [
                'name' => 'Eddy',
                'email' => 'eddycode@gmail.com',
                'role' => 'user',
                'password' => Hash::make('Password')
            ]
        ]);
    }
}

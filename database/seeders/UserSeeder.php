<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Karyawan User',
                'email' => 'karyawan@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 'karyawan',
            ],
            [
                'name' => 'Admin User',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 'admin',
            ],
            [
                'name' => 'Pajak User',
                'email' => 'pajak@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 'pajak',
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}


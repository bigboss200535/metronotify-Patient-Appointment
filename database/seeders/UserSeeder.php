<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userdata = User::create([
            'user_id' => 'b2c362bf-56df-4337-be34-7062ffae8bd5',
            'email' => 'alhassan.mohammedga@gmail.com',
            'password' => Hash::make('@Mohammed200535'),
            'firstname' => 'Mohammed',
            'othername' => 'Alhassan',
            'telephone' => '0245340461',
            'gender' => 'Male',
            'user_role' => 'Developer', //Patient, Administrator, User, 
            'is_admin' => true,
            'added_id' => 'b2c362bf-56df-4337-be34-7062ffae8bd5',
            'is_blocked' => false,
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Roles;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin
        $admin =  Roles::create([
            'name' => 'Admin',
            'slug' => 'admin',
        ]);
        User::create([
            'role_id' => $admin->id,
            'fname'   => 'Admin',
            'lname'   => 'Admin',
            'email'   => 'admin@gmail.com',
            'password' => Hash::make(12345678),
        ]);

        // Doctor
        $doctor =  Roles::create([
            'name' => 'Doctor',
            'slug' => 'doctor',
        ]);
        User::create([
            'role_id' => $doctor->id,
            'fname'   => 'Doctor',
            'lname'   => 'Doctor',
            'email'   => 'doctor@gmail.com',
            'password' => Hash::make(12345678),
        ]);

        // Client
        $client =  Roles::create([
            'name' => 'Client',
            'slug' => 'client',
        ]);
        User::create([
            'role_id' => $client->id,
            'fname'   => 'Client',
            'lname'   => 'Client',
            'email'   => 'client@gmail.com',
            'password' => Hash::make(12345678),
        ]);
    }
}

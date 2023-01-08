<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        
        User::create([
            'name'      => 'Admin Hoa',
            'email'     => 'hoacdmy@gmail.com',
            'password'  => bcrypt('h04dm1n'),
            'role'      => 'admin',
        ]);

        User::create([
            'name'      => 'Admin Hoa 2',
            'email'     => 'hoa2@gmail.com',
            'password'  => bcrypt('h04dm1n'),
            'role'      => 'admin',
        ]);

        User::create([
            'name'      => 'User',
            'email'     => 'user@gmail.com',
            'password'  => bcrypt('stipen'),
            'role'      => 'user',
        ]);
    }
}

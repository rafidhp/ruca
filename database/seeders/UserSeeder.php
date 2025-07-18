<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'username' => 'admin',
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin'),
                'role' => 'admin',
            ],
            [
                'username' => 'user',
                'name' => 'user',
                'email' => 'user@gmail.com',
                'password' => bcrypt('user'),
                'role' => 'user',
            ],
            [
                'username' => 'psikolog',
                'name' => 'psikolog',
                'email' => 'psikolog@gmail.com',
                'password' => bcrypt('psikolog'),
                'role' => 'psikolog',
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
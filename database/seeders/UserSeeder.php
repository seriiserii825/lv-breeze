<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Student',
                'email' => 'seriiburduja@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'student',
                'approve_status' => 'pending',
            ],
            [
                'name' => 'Instructor',
                'email' => 'instructor@mail.com',
                'password' => bcrypt('12345678'),
                'role' => 'instructor',
                'approve_status' => 'pending',
            ]
        ];

        User::insert($users);
    }
}

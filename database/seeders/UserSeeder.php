<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // PASSWORD COMÚN
        $password = Hash::make('12345678');

        // ======================
        // ADMIN (1)
        // ======================
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@instituto.com',
            'password' => $password,
        ]);

        $admin->assignRole('admin');

        // ======================
        // TEACHERS (5)
        // ======================
        for ($i = 1; $i <= 5; $i++) {
            $teacher = User::create([
                'name' => "Teacher $i",
                'email' => "teacher$i@instituto.com",
                'password' => $password,
            ]);

            $teacher->assignRole('teacher');
        }

        // ======================
        // STUDENTS (5)
        // ======================
        for ($i = 1; $i <= 5; $i++) {
            $student = User::create([
                'name' => "Student $i",
                'email' => "student$i@instituto.com",
                'password' => $password,
            ]);

            $student->assignRole('student');
        }
    }
}

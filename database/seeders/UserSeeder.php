<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // 10 PROFESORES
        User::factory()
            ->count(10)
            ->create()
            ->each(fn ($user) => $user->assignRole('teacher'));

        // 1 ADMIN
        $admin = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@instituto.com',
            'password' => Hash::make('admin123'),
        ]);

        $admin->assignRole('admin');
    }
}

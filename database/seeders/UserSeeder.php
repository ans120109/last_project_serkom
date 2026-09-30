<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['username' => 'admin'],
            [
                'name'           => 'Administrator',
                'password'       => 'password',
                'role'           => 'admin',
                'status'         => 'aktif',
                'last_active_at' => now(),
            ]
        );
    }
}

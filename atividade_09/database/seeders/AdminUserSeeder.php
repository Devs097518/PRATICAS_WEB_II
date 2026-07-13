<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            [
                'email' => 'admin@biblioteca.com'
            ],
            [
                'name' => 'Administrador',
                'password' => '12345678',
                'role' => 'admin',
            ]
        );
    }
}

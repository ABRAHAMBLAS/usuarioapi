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
        // Crear un usuario admin
        for ($i = 1; $i <= 10; $i++) {
            User::create([
                'firstname' => "Nombre{$i}",
                'lastname' => "Apellido{$i}",
                'username' => "usuario{$i}",
                'email' => "usuario{$i}@ejemplo.com",
                'password' => Hash::make('password123'), // contraseña cifrada
                'fecha' => now()->subYears(rand(18, 40))->subDays(rand(0, 365)), // fecha de nacimiento aleatoria
            ]);
        }


        // Crear múltiples usuarios de ejemplo

    }
}

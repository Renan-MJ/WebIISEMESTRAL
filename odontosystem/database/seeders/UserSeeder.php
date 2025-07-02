<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User ::create([
            'name' => 'admin',
            'email' => 'admin@teste.com',
            'password' => Hash::make('12345678'),
            'tipo' => 'admin',
        ]);

        User::create([
            'name' => 'Dentista João',
            'name' => 'joao@teste.com',
            'password' => Hash::make('12345678'),
            'tipo' => 'dentisa',
        ]);

        User::create ([ 
            'name' => 'Paciente Maria',
            'email' => 'maria@teste.com',
            'password' => Hash::make('12345678'),
            'tipo' => 'paciente',
        ]);
    }
}

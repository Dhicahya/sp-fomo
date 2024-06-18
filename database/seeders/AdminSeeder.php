<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username'=> 'Admin',
            'email' => 'admin@gmail.com',
            'name' => 'admin',
            'role' => 'admin',
            'password' => 'admin123',
            'instansi'=> 'Universitas Muhammadiyah Cirebon'
        ]);
    }
}
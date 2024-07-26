<?php

namespace Database\Seeders;
use App\Models\User;
use Carbon\Carbon;
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
            'created_at' => Carbon::now(),
        ]);
    }
}

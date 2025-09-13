<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::updateOrCreate(
            ['email' => 'admin@example.test'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('password123'), // ganti sesuai kebutuhan
                'is_admin' => true,
            ]
        );
    }
}

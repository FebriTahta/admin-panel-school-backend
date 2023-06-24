<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::firstOrCreate([
            'name' => 'admin',
            'pass_vis' => 'admin',
            'password' => Hash::make('admin'),
            'role' => 'super_admin',
        ]);
    }
}

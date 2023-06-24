<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Pagetype;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create(); 

        $user = User::where('name','admin')->where('role','super_admin')->first();
        if ($user == null) {
            # code...
            \App\Models\User::firstOrCreate([
                'name' => 'admin',
                'pass_vis' => 'admin',
                'password' => Hash::make('admin'),
                'role' => 'super_admin',
            ]);
        }

        \App\Models\Pagetype::firstOrCreate([
            'type_name' => 'video',
            'type_slug' => 'video',
        ]);

        \App\Models\Pagetype::firstOrCreate([
            'type_name' => 'galeri',
            'type_slug' => 'galeri',
        ]);

        \App\Models\Pagetype::firstOrCreate([
            'type_name' => 'blog',
            'type_slug' => 'blog',
        ]);

        \App\Models\Pagetype::firstOrCreate([
            'type_name' => 'teamlist',
            'type_slug' => 'teamlist',
        ]);

        \App\Models\Pagetype::firstOrCreate([
            'type_name' => 'pdf_view',
            'type_slug' => 'pdf_view',
        ]);

        \App\Models\Paymentcontrol::firstOrCreate([
            'paymentcontrol_name' => 'MIDTRANS',
            'paymentcontrol_merchant_id' => 'G400140055',
            'paymentcontrol_client_key' => 'SB-Mid-client-ZUcZHUE3iViL1Lpq',
            'paymentcontrol_server_key' => 'SB-Mid-server-T_UdN4X2THs48wx7R65Fj94k',
            'paymentcontrol_status' => 'aktif'
        ]);
    }
}

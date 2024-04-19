<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'name' => 'test',
            'email' => 'test@example.com',
            'password' => Hash::make('test'),
            'prefecture' => 1,
            'gender' => 0,
            'phone_number' => 00000000000,
            'birthday' => now()->subYear(),
            'archive_image_path' => '',
            'icon_image_path' => '',
            'is_enable' => true
        ]);
        \App\Models\Admin::create([
            'login_id' => 'admin',
            'password' => Hash::make('admin'),
        ]);
    }
}

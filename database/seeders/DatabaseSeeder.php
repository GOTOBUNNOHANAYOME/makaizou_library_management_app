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
            'prefecture' => 0,
            'gender' => 0,
            'phone_number' => 00000000000,
            'birthday' => now()->subYear(),
            'archive_image_path' => '',
            'icon_image_path' => ''
        ]);
        \App\Models\Library::create([
            'title' => 'test',
            'isbn_10' => 'test',
            'isbn_13'=> 'test',
            'description'=> 'test',
            'page'=> 300,
            'thumbnail_path'=> 'test',
            'icon_path' => 'test',
            'country' => '日本',
            'publisher' => 'test',
            'published_at' => now(),
        ]);
    }
}

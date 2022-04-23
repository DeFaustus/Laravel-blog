<?php

namespace Database\Seeders;

use App\Models\Kategori;
use App\Models\KategoriPost;
use App\Models\Post;
use App\Models\PostKategori;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'name'      => 'user',
            'email'     => 'user@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make(12345678),
            'role'      => 'user'
        ]);
        User::create([
            'name'      => 'admin',
            'email'     => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make(12345678),
            'role'      => 'admin'
        ]);
        Kategori::create([
            'nama'      => 'Web Programming',
            'slug'      => 'web-programming',
        ]);
        Kategori::create([
            'nama'      => 'Tutorial',
            'slug'      => 'tutorial',
        ]);
        // Post::factory(10)->create();
        // Kategori::factory(3)->create();
        // KategoriPost::factory(10)->create();
    }
}

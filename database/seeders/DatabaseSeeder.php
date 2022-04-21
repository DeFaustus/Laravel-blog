<?php

namespace Database\Seeders;

use App\Models\Kategori;
use App\Models\KategoriPost;
use App\Models\Post;
use App\Models\PostKategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        \App\Models\User::factory(10)->create();
        Post::factory(10)->create();
        Kategori::factory(3)->create();
        KategoriPost::factory(10)->create();
    }
}

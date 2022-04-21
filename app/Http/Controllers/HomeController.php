<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $gambar = ['b1.jpg', 'b2.jpg', 'b3.jpg'];
        return view('home.index', [
            'title'     => 'Home',
            'data'      => Post::with(['kategoris', 'user'])->latest()->limit(6)->get(),
            'gambar'    => $gambar,
            'kategori'  => Kategori::all(),
        ]);
    }
}

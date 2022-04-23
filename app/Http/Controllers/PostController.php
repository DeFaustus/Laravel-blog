<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function lihatPost(Post $post)
    {
        return view('home.lihatpost', [
            'title'     => $post->judul,
            'post'      => $post,
            'kategori'  => Kategori::all()
        ]);
    }
    public function semuaPost(Request $request)
    {
        $kategori = [];
        if ($request->kategori != '') {
            foreach ($request->kategori as $key) {
                array_push($kategori, $key);
            }
        }
        $request->input('kategori');
        return view('home.semuapost', [
            'title'     => "Semua Post",
            'data'      => Post::latest()->Filter(request(['search', 'author']), $kategori)->paginate(5)->withQueryString(),
            'kategori'  => Kategori::all(),
            'kategoris' => $kategori
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'title'     => "Dashboard"
        ]);
    }
    public function tambahpost()
    {
        return view('dashboard.tambahpost', [
            'title'     => "Tambah Post",
            'kategori'  => Kategori::all()
        ]);
    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            'judul'         => 'required',
            'kategori'      => 'required',
            'isi'           => 'required',
            'gambar'        => 'required|mimes:jpg,png,jpeg'
        ]);

        $validate['user_id'] = Auth::user()->id;
        $validate['slug'] = 'unique:posts,slug';
        $validate['slug'] = Str::slug($request->input('judul'), '-');
        $validate['excerpt'] = Str::limit(strip_tags($request->input('isi')), 100);
        if ($request->file('gambar')) {
            $fileName = $request->file('gambar')->hashName();
            Storage::putFileAs('public/gambar', $request->file('gambar'), $fileName);
        }
        $validate['gambar'] = $fileName;
        $post = Post::create($validate);
        foreach ($request->input('kategori') as $item) {
            $post->kategoris()->attach($item);
        }
        return redirect('/dashboard/postsaya')->with('status', "Berhasil Tambah Blog");
    }
    public function postsaya()
    {
        return view('dashboard.postsaya', [
            'title'     => "Post Saya",
            'data'      => Post::without(['user'])->latest()->where('user_id', Auth::user()->id)->get()
        ]);
    }
    public function edit(Post $post)
    {
        if ($post->user_id != Auth::user()->id) {
            abort(404);
        }
        $kategori = [];
        foreach ($post->kategoris as $key) {
            array_push($kategori, $key->id);
        }
        return view('dashboard.edit', [
            'title'      => "Edit",
            'post'       => $post,
            'kategori'   => Kategori::all(),
            'selectKategori'    => $kategori
        ]);
    }
    public function storeUpdate(Request $request)
    {
        $post = Post::find($request->id);
        if (Auth::user()->id != $post->user_id) {
            abort(404);
        }
        $validate = $request->validate([
            'judul'         => 'required',
            'kategori'      => 'required',
            'isi'           => 'required'
        ]);
        $validate['slug'] = 'unique:posts,slug';
        $slug = Str::slug($request->input('judul'), '-');
        $validate['slug'] = $slug;
        $excerpt = Str::limit(strip_tags($request->input('isi')), 100);
        $kat = [];
        foreach ($request->input('kategori') as $item) {
            array_push($kat, $item);
        }
        $post->kategoris()->sync($kat);
        if ($request->file('gambar')) {
            $validate['gambar'] = "mimes:jpg,png,jpeg";
            if (Storage::exists('public/gambar/' . $post->gambar)) {
                Storage::delete('public/gambar/' . $post->gambar);
            }
            $fileName = $request->file('gambar')->hashName();
            Storage::putFileAs('public/gambar', $request->file('gambar'), $fileName);
            $post = Post::where('id', $request->id)->update([
                'judul'     => $request->judul,
                'isi'       => $request->isi,
                'slug'      => $slug,
                'excerpt'   => $excerpt,
                'isi'       => $request->isi,
                'gambar'    => $fileName
            ]);
        }
        Post::where('id', $request->id)->update([
            'judul'     => $request->judul,
            'isi'       => $request->isi,
            'slug'      => $slug,
            'excerpt'   => $excerpt,
            'isi'       => $request->isi,
        ]);
        return redirect('/dashboard/postsaya')->with('status', "Berhasil Update Blog");
    }

    public function hapus(Request $request)
    {
        $post = Post::find($request->input('id'));
        if ($post->user_id != Auth::user()->id) {
            abort(404);
        }
        if (Storage::exists('public/gambar/' . $post->gambar)) {
            Storage::delete('public/gambar/' . $post->gambar);
        }
        $post->delete();
        return redirect('/dashboard/postsaya')->with('status', "Berhasil Hapus Blog");
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}

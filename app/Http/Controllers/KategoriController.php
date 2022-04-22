<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.admin.daftarkategori', [
            'title'     => "Daftar Kategori",
            'data'      => Kategori::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.tambahkategori', [
            'title'     => "Daftar Kategori",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kategori = $request->validate([
            'kategori'      => "required"
        ]);
        $kategori['nama']   = $request->kategori;
        $kategori['slug'] = Str::slug($request->kategori, '-');
        Kategori::create($kategori);
        return redirect('/dashboard/daftarkategori')->with('status', "Berhasil Tambah Kategori");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kategori = Kategori::find($id);
        return view('dashboard.admin.editkategori', [
            'title'     => "Daftar Kategori",
            'data'      => $kategori
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $kategori = $request->validate([
            'nama'      => "required"
        ]);
        $kategori['slug'] = Str::slug($request->kategori, '-');
        Kategori::where('id', $id)->update($kategori);
        return redirect('/dashboard/daftarkategori')->with('status', "Berhasil Update Kategori");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();
        return redirect('/dashboard/daftarkategori')->with('status', "Berhasil Hapus Kategori");
    }
}

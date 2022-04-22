@extends('dashboard.layout')
@section('dashboard')
    <div class="container-fluid mr-4 my-4">
        <div class="tambah border border-dark">
            <div class="form-tambah mx-3 my-4">
                <h3>Edit</h3>
                <div class="row justify-content-center">
                    <div class="col-6">
                        <form action="/dashboard/storeupdate" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Judul : </label>
                                <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul"
                                    id="exampleFormControlInput1" placeholder="masukkan judul"
                                    value="{{ old('judul', $post->judul) }}">
                                <input type="hidden" name="id" value="{{ $post->id }}">
                                @error('judul')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Kategori : </label>
                                <select class="form-control tambahpost @error('kategori') is-invalid @enderror"
                                    name="kategori[]" multiple="multiple">
                                    @foreach ($kategori as $kat)
                                        <option value="{{ $kat->id }}" @selected(old('kategori', $kat->id) == in_array($kat->id, $selectKategori))>
                                            {{ $kat->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('kategori')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Isi : </label>
                                <input id="x" type="hidden" name="isi" value="{{ old('isi', $post->isi) }}">
                                <trix-editor input="x"></trix-editor>
                                @error('isi')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <img src="{{ url('/storage/gambar', $post->gambar) }} " width="100" height="100" alt=""
                                    srcset="">
                                <br>
                                <label for="exampleFormControlInput1" class="form-label">Gambar : </label>
                                <input type="file" class="form-control" name="gambar" id="">
                                @error('gambar')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-success">Edit Post</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection

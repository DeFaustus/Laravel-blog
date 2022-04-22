@extends('dashboard.layout')
@section('dashboard')
    <div class="container-fluid mr-4 my-4">
        <div class="tambah border border-dark">
            <div class="form-tambah mx-3 my-4">
                <h3>Tambah</h3>
                <div class="row justify-content-center">
                    <div class="col-6">
                        <form action="{{ route('kategori.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Masukkan Kategori : </label>
                                <input type="text" class="form-control @error('kategori') is-invalid @enderror"
                                    name="kategori" id="exampleFormControlInput1" placeholder="masukkan kategori"
                                    value="{{ old('kategori') }}">
                                @error('kategori')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-success">Tambah Kategori</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection

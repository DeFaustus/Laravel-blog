@extends('dashboard.layout')
@section('dashboard')
    <div class="container-fluid mr-4 my-4">
        <div class="tambah border border-dark">
            <div class="content mx-3 my-3">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <h3 class="text-center">Postingan Saya</h3>
                <table class="table table-striped text-center">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Judul</th>
                            <th>Kategori</th>
                            <th scope="col">Waktu</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }} </td>
                                <td>
                                    <img src="{{ url('storage/gambar', $item->gambar) }}" width="60" height="60" alt="">
                                </td>
                                <td>{{ $item->judul }} </td>
                                <td>
                                    @foreach ($item->kategoris as $key)
                                        {{ $key->nama . ',' }}
                                    @endforeach
                                </td>
                                <td>{{ $item->created_at }} </td>
                                <td>
                                    <a href="/dashboard/edit/{{ $item->id }}" class="btn btn-warning mb-3">Edit</a>
                                    <form action="/dashboard/hapus" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection

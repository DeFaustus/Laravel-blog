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
                <h3 class="text-center">Kategori</h3>
                <table class="table table-striped text-center">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th>Nama</th>
                            <th>Dibuat </th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }} </td>
                                <td>{{ $item->nama }} </td>
                                <td>{{ $item->created_at }} </td>
                                <td>
                                    <a href="{{ route('kategori.show', $item->id) }}" class="btn btn-warning mb-3">Edit</a>
                                    <form action="{{ route('kategori.destroy', $item->id) }}" method="post">
                                        @method('DELETE')
                                        @csrf
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

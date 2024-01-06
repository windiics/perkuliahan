@extends('layouts/aplikasi')

@section('konten')
    <a href="/prodii/create" class="btn btn-primary">+Tambah Data Prodi</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nama Prodi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>
                        <a class='btn btn-secondary btn-sm' href='{{ url('/prodii/'.$item->id) }}'>Detail</a>
                        <a class='btn btn-warning btn-sm' href='{{ url('/prodii/'.$item->id.'/edit') }}'>Edit</a>
                        <form onsubmit="return confirm('Yakin akan menghapus data?')" class='d-inline' action="{{ '/prodii/' .$item->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $data->links() }}
@endsection

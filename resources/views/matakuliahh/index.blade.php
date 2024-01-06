@extends('layouts/aplikasi')

@section('konten')
    <a href="/matakuliahh/create" class="btn btn-primary">+Tambah Data Mata Kuliah</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nama Mata Kuliah</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>
                        <a class='btn btn-secondary btn-sm' href='{{ url('/matakuliahh/'.$item->id) }}'>Detail</a>
                        <a class='btn btn-warning btn-sm' href='{{ url('/matakuliahh/'.$item->id.'/edit') }}'>Edit</a>
                        <form onsubmit="return confirm('Yakin akan menghapus data?')" class='d-inline' action="{{ '/matakuliahh/' .$item->id }}" method="POST">
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

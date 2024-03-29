@extends('layouts/aplikasi')

@section('konten')
    <a href="/dosenn/create" class="btn btn-primary">+Tambah Data Dosen</a>
    <table class="table">
        <thead>
            <tr>
                <th>Image</th>
                <th>Nama</th>
                <th>Mata Kuliah</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>
                        @if ($item->image)
                            <img style="max-width:50px; max-height:50px" src="{{ url('image').'/'.$item->image }}"/>
                        @endif
                    </td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->matkul }}</td>
                    <td>
                        <a class='btn btn-secondary btn-sm' href='{{ url('/dosenn/'.$item->id) }}'>Detail</a>
                        <a class='btn btn-warning btn-sm' href='{{ url('/dosenn/'.$item->id.'/edit') }}'>Edit</a>
                        <form onsubmit="return confirm('Yakin akan menghapus data?')" class='d-inline' action="{{ '/dosenn/' .$item->id }}" method="POST">
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

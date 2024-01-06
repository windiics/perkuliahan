@extends('layouts/aplikasi')

@section('konten')
    <div>
        <a href='/dosenn' class="btn btn-secondary"><< Kembali</a>
        <h1>{{ $data->name }}</h1>
        <p>
            <b>ID</b> {{ $data->id }}
        </p>
        <p>
            <b>Mata Kuliah</b> {{ $data->matkul }}
        </p>
    </div>
@endsection
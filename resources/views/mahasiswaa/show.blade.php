@extends('layouts/aplikasi')

@section('konten')
    <div>
        <a href='/mahasiswaa' class="btn btn-secondary"><< Kembali</a>
        <h1>{{ $data->name }}</h1>
        <p>
            <b>ID</b> {{ $data->id }}
        </p>
        <p>
            <b>Alamat</b> {{ $data->alamat }}
        </p>
    </div>
@endsection
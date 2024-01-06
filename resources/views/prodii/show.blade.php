@extends('layouts/aplikasi')

@section('konten')
    <div>
        <a href='/prodii' class="btn btn-secondary"><< Kembali</a>
        <h1>{{ $data->name }}</h1>
        <p>
            <b>ID</b> {{ $data->id }}
        </p>
    </div>
@endsection
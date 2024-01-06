@extends('layouts/aplikasi')

@section('konten')
<head>
  <link rel="stylesheet" href="{{ 'css/app.css' }}">
</head>

<a href='/matakuliahh' class="btn btn-secondary"><< Kembali</a>

<form method="POST" action="{{'/matakuliahh/' .$data->id}}" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="mb-3">
      <h1>ID {{ $data->id }}</h1>
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Nama Mata Kuliah</label>
        <input type="text" class="form-control" name='name' id="name" value=" {{ $data->name }} ">
      </div>
      <div class="mb-3">
        <button type="submit" class="btn btn-primary">UPDATE</button>
</form>

@endsection

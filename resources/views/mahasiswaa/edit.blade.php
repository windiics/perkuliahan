@extends('layouts/aplikasi')

@section('konten')
<head>
  <link rel="stylesheet" href="{{ 'css/app.css' }}">
</head>

<a href='/mahasiswaa' class="btn btn-secondary"><< Kembali</a>

<form method="POST" action="{{'/mahasiswaa/' .$data->id}}" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="mb-3">
      <h1>ID {{ $data->id }}</h1>
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Nama</label>
        <input type="text" class="form-control" name='name' id="name" value=" {{ $data->name }} ">
      </div>
      <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <textarea class="form-control" name='alamat'>{{ $data->alamat }}</textarea>
      </div>
      @if ($data->image)
          <div class="mb-3">
            <img style="max-width:50px;max-height:50px" src="{{ url('image').'/'.$data->image }}"/>
          </div>
      @endif
      <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input type="file" class="form-control" name="image" id="image">
      </div>
      <div class="mb-3">
        <button type="submit" class="btn btn-primary">UPDATE</button>
</form>

@endsection

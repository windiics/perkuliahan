@extends('layouts/aplikasi')

@section('konten')

<form method="POST" action="/mahasiswaa" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Nama Mahasiswa</label>
        <input type="text" class="form-control" name='name' id="name" value=" {{ Session::get('name') }} ">
      </div>
      <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <textarea class="form-control" name='alamat'>{{ Session::get('alamat') }}</textarea>
      </div>
      <div class="mb-3">
        <label for="image" class="form-label">Foto</label>
        <input type="file" class="form-control" name="image" id="image">
      </div>
      <div class="mb-3">
        <button type="submit" class="btn btn-primary">SIMPAN</button>
</form>

@endsection

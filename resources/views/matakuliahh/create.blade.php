@extends('layouts/aplikasi')

@section('konten')

<form method="POST" action="/matakuliahh" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Nama Mata Kuliah</label>
        <input type="text" class="form-control" name='name' id="name" value=" {{ Session::get('name') }} ">
      </div>
      <div class="mb-3">
        <button type="submit" class="btn btn-primary">SIMPAN</button>
</form>

@endsection

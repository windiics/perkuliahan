<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MahasiswaResource;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::latest()->paginate(5);

        return new MahasiswaResource(true, 'List Data Mahasiswa', $mahasiswas);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:3048',
            'name'     => 'required',
            'alamat'   => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $image = $request->file('image');
        $image->storeAs('public/mahasiswas', $image->hashName());

        $mahasiswas = Mahasiswa::create([
            'image'     => $image->hashName(),
            'name'     => $request->name,
            'alamat'   => $request->alamat,
        ]);

        return new MahasiswaResource(true, 'Data Mahasiswa Berhasil Ditambahkan!', $mahasiswas);
    }

    public function show($id)
    {
        $mahasiswas = Mahasiswa::find($id);

        return new MahasiswaResource(true, 'Detail Data Mahasiswa!', $mahasiswas);
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name'     => 'required',
            'alamat'   => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $mahasiswas = Mahasiswa::find($id);

        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $image->storeAs('public/mahasiswas', $image->hashName());

            Storage::delete('public/mahasiswas/'.basename($mahasiswas->image));

            $mahasiswas->update([
                'image'     => $image->hashName(),
                'name'     => $request->name,
                'alamat'   => $request->alamat,
            ]);

        } else {

            $mahasiswas->update([
                'name'     => $request->name,
                'alamat'   => $request->alamat,
            ]);
        }

        return new MahasiswaResource(true, 'Data Mahasiswa Berhasil Diubah!', $mahasiswas);
    }


    public function destroy($id)
    {

        $mahasiswas = Mahasiswa::find($id);

        Storage::delete('public/mahasiswas/'.basename($mahasiswas->image));

        $mahasiswas->delete();

        return new MahasiswaResource(true, 'Data Mahasiswa Berhasil Dihapus!', null);
    }
}

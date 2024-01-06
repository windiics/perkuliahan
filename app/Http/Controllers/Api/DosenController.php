<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DosenResource;
use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class DosenController extends Controller
{
    public function index()
    {
        $dosens = Dosen::latest()->paginate(5);

        return new DosenResource(true, 'List Data Dosen Pengajar', $dosens);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:3048',
            'name'     => 'required',
            'matkul'   => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $image = $request->file('image');
        $image->storeAs('public/dosens', $image->hashName());

        $dosens = Dosen::create([
            'image'     => $image->hashName(),
            'name'     => $request->name,
            'matkul'   => $request->matkul,
        ]);

        return new DosenResource(true, 'Data Dosen Berhasil Ditambahkan!', $dosens);
    }

    public function show($id)
    {
        $dosens = Dosen::find($id);

        return new DosenResource(true, 'Detail Data Dosen Pengajar!', $dosens);
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name'     => 'required',
            'matkul'   => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $dosens = Dosen::find($id);

        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $image->storeAs('public/dosens', $image->hashName());

            Storage::delete('public/dosens/'.basename($dosens->image));

            $dosens->update([
                'image'     => $image->hashName(),
                'name'     => $request->name,
                'matkul'   => $request->matkul,
            ]);

        } else {

            $dosens->update([
                'name'     => $request->name,
                'matkul'   => $request->matkul,
            ]);
        }

        return new DosenResource(true, 'Data Dosen Pengajar Berhasil Diubah!', $dosens);
    }

    public function destroy($id)
    {

        $dosens = Dosen::find($id);

        Storage::delete('public/dosens/'.basename($dosens->image));

        $dosens->delete();

        return new DosenResource(true, 'Data Dosen Pengajar Berhasil Dihapus!', null);
    }
}

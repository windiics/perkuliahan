<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProdiResource;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProdiController extends Controller
{
    public function index()
    {
        $prodis = Prodi::latest()->paginate(5);

        return new ProdiResource(true, 'List Data Mata Kuliah', $prodis);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'     => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $prodis = Prodi::create([
            'name'     => $request->name,
        ]);

        return new ProdiResource(true, 'Data Prodi Berhasil Ditambahkan!', $prodis);
    }
    
    public function show($id)
    {
        $prodis = Prodi::find($id);

        return new ProdiResource(true, 'Detail Data Prodi!', $prodis);
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name'     => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $prodis = Prodi::find($id);

            $prodis->update([
                'name'     => $request->name
            ]);

        return new ProdiResource(true, 'Data Prodi Berhasil Diubah!', $prodis);
    }

    public function destroy($id)
    {

        $prodis = Prodi::find($id);

        $prodis->delete();

        return new ProdiResource(true, 'Data Prodi Berhasil Dihapus!', null);
    }
}

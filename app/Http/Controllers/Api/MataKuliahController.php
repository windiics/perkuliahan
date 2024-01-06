<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MataKuliahResource;
use App\Models\MataKuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MataKuliahController extends Controller
{
    public function index()
    {
        $mata_kuliahs = MataKuliah::latest()->paginate(5);

        return new MataKuliahResource(true, 'List Data Mata Kuliah', $mata_kuliahs);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'     => 'required',
            'dosenpengampu'     => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $mata_kuliahs = MataKuliah::create([
            'name'     => $request->name,
            'dosenpengampu'     => $request->dosenpengampu,
        ]);

        return new MataKuliahResource(true, 'Data Mata Kuliah Berhasil Ditambahkan!', $mata_kuliahs);
    }

    public function show($id)
    {
        $mata_kuliahs = MataKuliah::find($id);

        return new MataKuliahResource(true, 'Detail Data Mata Kuliah!', $mata_kuliahs);
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name'     => 'required',
            'dosenpengampu'     => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $mata_kuliahs = MataKuliah::find($id);

            $mata_kuliahs->update([
                'name'     => $request->name,
                'dosenpengampu'     => $request->name
            ]);

        return new MataKuliahResource(true, 'Data Mata Kuliah Berhasil Diubah!', $mata_kuliahs);
    }

    public function destroy($id)
    {

        $mata_kuliahs = MataKuliah::find($id);

        $mata_kuliahs->delete();

        return new MataKuliahResource(true, 'Data Mata Kuliah Berhasil Dihapus!', null);
    }
}

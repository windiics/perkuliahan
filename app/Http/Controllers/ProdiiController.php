<?php

namespace App\Http\Controllers;

use App\Models\prodii;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class ProdiiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = prodii::orderBy('id', 'asc')->paginate(3);
        return view('prodii/index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('prodii/create');
    }

    /**
     * Store a newly created resource in storage.
     * 
     * 
     * 
     */
    public function store(Request $request)
    {

        Session::flash('name', $request->name);
        Session::flash('kode', $request->kode);

        $request->validate([
            'name'=> 'required',
            'kode'=>'required',
        ],[
            'name.required'=>'Nama wajib diisi',
            'kode.required'=>'kode wajib diisi',
        ]);

        $data = [
            'name' => $request->input('nama'),
            'kode' => $request->input('kode'),
        ];
        prodii::create($data);
        return redirect('prodii')->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = prodii::where('id', $id)->first();
        return view('prodii/show')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = prodii::where('id', $id)->first();
        return view('prodii/edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>'required',
            'kode'=>'required'
        ],[
            'name.required'=>'Nama wajib diisi',
            'kode.required'=>'kode wajib diisi'
        ]);
        $data = [
            'name' => $request->input('name'),
            'kode' => $request->input('kode'),
        ];

        prodii::where('id', $id)->update($data);
        return redirect('/prodii')->with('success', 'Berhasil memperbarui data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        prodii::where('id', $id)->delete();
        return redirect('/prodii')->with('success', 'Berhasil menghapus data');

    }
}

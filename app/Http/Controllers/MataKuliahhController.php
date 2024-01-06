<?php

namespace App\Http\Controllers;

use App\Models\matakuliahh;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class MataKuliahhController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = matakuliahh::orderBy('id', 'asc')->paginate(3);
        return view('matakuliahh/index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('matakuliahh/create');
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
        Session::flash('dosenpengampu', $request->dosenpengampu);

        $request->validate([
            'name'=> 'required',
            'dosenpengampu'=>'required',
        ],[
            'name.required'=>'Nama wajib diisi',
            'dosenpengampu.required'=>'dosenpengampu wajib diisi',
        ]);

        $data = [
            'name' => $request->input('nama'),
            'dosenpengampu' => $request->input('dosenpengampu'),
        ];
        matakuliahh::create($data);
        return redirect('matakuliahh')->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = matakuliahh::where('id', $id)->first();
        return view('matakuliahh/show')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = matakuliahh::where('id', $id)->first();
        return view('matakuliahh/edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>'required',
            'dosenpengampu'=>'required'
        ],[
            'name.required'=>'Nama wajib diisi',
            'dosenpengampu.required'=>'dosenpengampu wajib diisi'
        ]);
        $data = [
            'name' => $request->input('name'),
            'dosenpengampu' => $request->input('dosenpengampu'),
        ];

        matakuliahh::where('id', $id)->update($data);
        return redirect('/matakuliahh')->with('success', 'Berhasil memperbarui data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        matakuliahh::where('id', $id)->delete();
        return redirect('/matakuliahh')->with('success', 'Berhasil menghapus data');

    }
}

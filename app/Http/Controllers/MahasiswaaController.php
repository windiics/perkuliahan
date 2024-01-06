<?php

namespace App\Http\Controllers;

use App\Models\mahasiswaa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class MahasiswaaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = mahasiswaa::orderBy('id', 'asc')->paginate(3);
        return view('mahasiswaa/index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mahasiswaa/create');
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
        Session::flash('alamat', $request->alamat);

        $request->validate([
            'name'=> 'required',
            'alamat'=>'required',
            'image'=>'required|mimes:jpeg,jpg,png,gif'
        ],[
            'name.required'=>'Nama wajib diisi',
            'alamat.required'=>'Alamat wajib diisi',
            'image.required'=>'Silahkan masukkan image',
            'image.mimes' => 'Foto hanya diperbolehkan berekstensi JPEG,JPG,PNG, dan GIF'
        ]);

        $image_file = $request->file('image');
        $image_ekstensi = $image_file->extension();
        $image_nama = date('ymdhis') .".". $image_ekstensi;
        $image_file->move(public_path('image'),$image_nama);

        $data = [
            'name' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
            'image' => $image_nama
        ];
        mahasiswaa::create($data);
        return redirect('mahasiswaa')->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = mahasiswaa::where('id', $id)->first();
        return view('mahasiswaa/show')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = mahasiswaa::where('id', $id)->first();
        return view('mahasiswaa/edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>'required',
            'alamat'=>'required'
        ],[
            'name.required'=>'Nama wajib diisi',
            'alamat.required'=>'Alamat wajib diisi'
        ]);
        $data = [
            'name' => $request->input('name'),
            'alamat' => $request->input('alamat'),
        ];

        if($request->hasFile('image')){
            $request->validate([
                'image'=>'mimes:jpeg,jpg,png,gif'
            ],[
                'image.mimes' => 'Foto hanya diperbolehkan berekstensi JPEG,JPG,PNG, dan GIF'
            ]);
            $image_file = $request->file('image');
            $image_ekstensi = $image_file->extension();
            $image_nama = date('ymdhis') .".". $image_ekstensi;
            $image_file->move(public_path('image'),$image_nama);
            //sudah terupload ke directori

            $data_image = mahasiswaa::where('id',$id)->first();
            File::delete(public_path('image').'/'.$data_image->image);

            // $data = [
            //     'image' => $image_nama
            // ];

            $data['image'] = $image_nama;
            
        }

        mahasiswaa::where('id', $id)->update($data);
        return redirect('/mahasiswaa')->with('success', 'Berhasil memperbarui data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = mahasiswaa::where('id', $id)->first();
        File::delete(public_path('image').'/'. $data->image);

        mahasiswaa::where('id', $id)->delete();
        return redirect('/mahasiswaa')->with('success', 'Berhasil menghapus data');

    }
}

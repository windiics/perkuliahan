<?php

namespace App\Http\Controllers;

use App\Models\dosenn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class DosennController extends Controller
    {
        /**
         * Display a listing of the resource.
         */
        public function index()
        {
            $data = dosenn::orderBy('id', 'asc')->paginate(3);
            return view('dosenn/index')->with('data', $data);
        }
    
        /**
         * Show the form for creating a new resource.
         */
        public function create()
        {
            return view('dosenn/create');
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
            Session::flash('matkul', $request->matkul);
    
            $request->validate([
                'name'=> 'required',
                'matkul'=>'required',
                'image'=>'required|mimes:jpeg,jpg,png,gif'
            ],[
                'name.required'=>'Nama wajib diisi',
                'matkul.required'=>'Mata Kuliah wajib diisi',
                'image.required'=>'Silahkan masukkan image',
                'image.mimes' => 'Foto hanya diperbolehkan berekstensi JPEG,JPG,PNG, dan GIF'
            ]);
    
            $image_file = $request->file('image');
            $image_ekstensi = $image_file->extension();
            $image_nama = date('ymdhis') .".". $image_ekstensi;
            $image_file->move(public_path('image'),$image_nama);
    
            $data = [
                'name' => $request->input('nama'),
                'matkul' => $request->input('matkul'),
                'image' => $image_nama
            ];
            dosenn::create($data);
            return redirect('dosenn')->with('success', 'Berhasil menambahkan data');
        }
    
        /**
         * Display the specified resource.
         */
        public function show(string $id)
        {
            $data = dosenn::where('id', $id)->first();
            return view('dosenn/show')->with('data', $data);
        }
    
        /**
         * Show the form for editing the specified resource.
         */
        public function edit(string $id)
        {
            $data = dosenn::where('id', $id)->first();
            return view('dosenn/edit')->with('data', $data);
        }
    
        /**
         * Update the specified resource in storage.
         */
        public function update(Request $request, string $id)
        {
            $request->validate([
                'name'=>'required',
                'matkul'=>'required'
            ],[
                'name.required'=>'Nama wajib diisi',
                'matkul.required'=>'Mata Kuliah wajib diisi'
            ]);
            $data = [
                'name' => $request->input('name'),
                'matkul' => $request->input('matkul'),
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
    
                $data_image = dosenn::where('id',$id)->first();
                File::delete(public_path('image').'/'.$data_image->image);
    
                // $data = [
                //     'image' => $image_nama
                // ];
    
                $data['image'] = $image_nama;
                
            }
    
            dosenn::where('id', $id)->update($data);
            return redirect('/dosenn')->with('success', 'Berhasil memperbarui data');
        }
    
        /**
         * Remove the specified resource from storage.
         */
        public function destroy(string $id)
        {
            $data = dosenn::where('id', $id)->first();
            File::delete(public_path('image').'/'. $data->image);
    
            dosenn::where('id', $id)->delete();
            return redirect('/dosenn')->with('success', 'Berhasil menghapus data');
    
        }
}

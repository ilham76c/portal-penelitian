<?php

namespace App\Http\Controllers;

use App\Models\AplikasiModel;
use Illuminate\Http\Request;

class AplikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // mengambil data aplikasi dari database
        $aplikasi = AplikasiModel::select()->get();

        // berpindah ke halaman Datatable Aplikasi dan mengirimkan variable "$aplikasi" yang berisi data penelitian 
        return view("admin.table-aplikasi", compact("aplikasi"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.form-tambah-aplikasi");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "url" => "required",
            "nama" => "required",
            "deskripsi" => "required"            
        ]);
                
        $query = AplikasiModel::create([
            "url" => $request->url,
            "nama" => $request->nama,
            "deskripsi" => $request->deskripsi            
        ]);

        if (!$query) {
            return back()->withInput()->with('status', 'gagal');
        }
        return back()->withInput()->with('status', 'berhasil');  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AplikasiModel  $aplikasiModel
     * @return \Illuminate\Http\Response
     */
    public function show(AplikasiModel $aplikasiModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AplikasiModel  $aplikasiModel
     * @return \Illuminate\Http\Response
     */
    public function edit(AplikasiModel $aplikasiModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AplikasiModel  $aplikasiModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AplikasiModel $aplikasiModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AplikasiModel  $aplikasiModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(AplikasiModel $aplikasiModel)
    {
        //
    }
}

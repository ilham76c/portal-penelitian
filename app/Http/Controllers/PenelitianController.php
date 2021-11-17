<?php

namespace App\Http\Controllers;

use App\Models\PenelitianModel;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class PenelitianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // mengambil data penelitian dari database
        $penelitian = PenelitianModel::select()->get();        

        // berpindah ke halaman Data Penelitian dan mengirimkan variable "$penelitian" yang berisi data penelitian 
        return view("admin.table-penelitian", compact("penelitian"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.form-tambah-penelitian");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $validatedData = $request->validate([
            "judul" => "required",
            "abstrak" => "required",
            "penulis" => "required",
            "nrp" => "required|max:12",
            "tahun" => "required|max:10",
            "kata_kunci" => "required",
            "file" => "required"
        ]);
        $path = $request->file->storePublicly("uploads");
                
        $query = PenelitianModel::create([
            "judul" => $request->judul,
            "abstrak" => $request->abstrak,
            "penulis" => $request->penulis,
            "nrp" => $request->nrp,
            "file" => explode("/", $path)[1],
            "tahun" => $request->tahun,
            "kata_kunci" => $request->kata_kunci
        ]);

        if (!$query) {
            return back()->withInput()->with('status', 'gagal');
        }
        return back()->withInput()->with('status', 'berhasil');        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PenelitianModel  $penelitianModel
     * @return \Illuminate\Http\Response
     */
    public function show(PenelitianModel $penelitianModel)
    {
        //return $penelitianModel::find($id);
        return $penelitianModel;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PenelitianModel  $penelitianModel
     * @return \Illuminate\Http\Response
     */
    public function edit(PenelitianModel $penelitianModel)
    {                
        return view("admin.form-edit-penelitian", ['penelitian' => $penelitianModel]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PenelitianModel  $penelitianModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PenelitianModel $penelitianModel)
    {
        if (isset($request->file)) {
            $penelitianModel->file = explode("/", $request->file->storeAs("uploads", $penelitianModel->file))[1];            
        }
        PenelitianModel::where('id', $penelitianModel->id)->update([
            'judul'   => $request->judul,
            'abstrak' => $request->abstrak,
            'penulis' => $request->penulis,
            'nrp'     => $request->nrp,
            'file'    => $penelitianModel->file,
            'tahun'   => $request->tahun,
            'kata_kunci' => $request->kata_kunci
        ]);
        //return back()->withInput()->with('status', 'berhasil');       
        return redirect("/penelitian/form/{$penelitianModel->id}/edit")->with('status', 'berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PenelitianModel  $penelitianModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(PenelitianModel $penelitianModel)
    {        
        Storage::delete("uploads/{$penelitianModel->file}");
        PenelitianModel::destroy($penelitianModel->id);
        return redirect('/penelitian/table');
    }

    /**
     * Return specific file from resource storage.
     * @param  \Illuminate\Support\Facades\Storage
     * @return \Illuminate\Http\Response
     */
    public function download(string $fileName)
    {        
        if (Storage::exists("uploads/{$fileName}")) {
            return Storage::download("uploads/{$fileName}", $fileName, [
                "Content-Type" => "application/pdf",
                "Content-Disposition" => "inline; ".$fileName,
            ]);
        } else {
            return "File not found.";
        }
    }
}

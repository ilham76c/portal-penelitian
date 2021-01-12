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
        $penelitian = PenelitianModel::paginate(6);
        return view("user.skripsi", compact("penelitian"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$name = $request;
        //$path = $request->file;
        // return DB::table("tbl_penelitian")->insert([
        //     "judul" => $request->judul,
        //     "abstrak" => $request->abstrak,
        //     "penulis" => $request->penulis,
        //     "nrp" => $request->nrp,
        //     "file" => $path,
        //     "tahun" => $request->tahun
        // ]);
        // return json_decode($request);        
        //return $request->all();
        $validatedData = $request->validate([
            "judul" => "required",
            "abstrak" => "required",
            "penulis" => "required",
            "nrp" => "required|max:12",
            "tahun" => "required|max:10",
            "file" => "required"
        ]);
        $path = $request->file->storePublicly("uploads");
        
        //return $request->file;
        return PenelitianModel::create([
                "judul" => $request->judul,
                "abstrak" => $request->abstrak,
                "penulis" => $request->penulis,
                "nrp" => $request->nrp,
                "file" => explode("/", $path)[1],
                "tahun" => $request->tahun
            ]);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PenelitianModel  $penelitianModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(PenelitianModel $penelitianModel)
    {
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
        //return Storage::putFile("uploads", new File(Storage::path("uploads/{$fileName}")));
        return Storage::download("uploads/{$fileName}", $fileName, [
            "Content-Type" => "application/pdf",
            "Content-Disposition" => "inline; ".$fileName,
        ]);
        //return Storage::path($fileName);
        // return Response::make($path, 200, [
        //     "Content-Type" => "application/pdf",
        //     "Content-Disposition" => "inline; ".$filename,
        //     ]);
        // return response()->download(Storage::url("uploads/{$fileName}", [
        //         "Content-Type" => "application/pdf",
        //         "Content-Disposition" => "inline; ".$fileName,
        //     ]));
    }
}

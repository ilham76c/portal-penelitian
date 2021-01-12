<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PenelitianModel;

class AdminController extends Controller
{
    public function index() 
    {
        return view("admin.dashboard");
    }

    public function penelitianTable()
    {
        // mengambil data penelitian dari database
        $penelitian = PenelitianModel::select()->get();        

        // berpindah ke halaman Data Penelitian dan mengirimkan variable "$penelitian" yang berisi data penelitian 
        return view("admin.table-penelitian", compact("penelitian"));
    }

    public function penelitianForm()
    {
        return view("admin.form-penelitian");
    }

    public function aplikasiTable()
    {
        return view("admin.table-aplikasi");
    }

    public function aplikasiForm()
    {
        return view("admin.form-aplikasi");
    }
}

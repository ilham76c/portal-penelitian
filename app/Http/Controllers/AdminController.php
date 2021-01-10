<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() 
    {
        return view("admin.dashboard");
    }

    public function penelitianTable()
    {
        return view("admin.table-penelitian");
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

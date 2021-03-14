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

    public function aplikasiTable()
    {
        return view("admin.table-aplikasi");
    }

    public function aplikasiForm()
    {
        return view("admin.form-aplikasi");
    }
}

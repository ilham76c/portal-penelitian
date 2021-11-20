<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PenelitianModel;
use App\Models\AplikasiModel;

class UserController extends Controller
{
    public function home()
    {
        return view("user.home");
    }

    public function penelitian()
    {        
        $penelitian = PenelitianModel::paginate(6);
        // setPath berfungsi agar protokol tidak berganti menjadi "http" ketika kita menggunakan "https"
        $penelitian->setPath('/penelitian');
        return view("user.penelitian", compact("penelitian"));
    }

    public function aplikasi()
    {
        $aplikasi = AplikasiModel::paginate(6);
        // setPath berfungsi agar protokol tidak berganti menjadi "http" ketika kita menggunakan "https"
        $aplikasi->setPath('/aplikasi');
        return view("user.aplikasi", compact("aplikasi"));
    }
}

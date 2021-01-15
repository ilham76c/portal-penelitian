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
        return view("user.penelitian", compact("penelitian"));
    }

    public function aplikasi()
    {
        $aplikasi = AplikasiModel::paginate(6);
        return view("user.aplikasi", compact("aplikasi"));
    }
}

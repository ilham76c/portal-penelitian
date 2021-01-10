<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PenelitianModel;

class UserController extends Controller
{
    public function home()
    {
        return view("user.home");
    }

    public function skripsi()
    {
        $penelitian = PenelitianModel::paginate(1);
        ///dd($penelitian);
        return view("user.skripsi", ['penelitian' => $penelitian]);
    }

    public function aplikasi()
    {
        return view("user.aplikasi");
    }
}

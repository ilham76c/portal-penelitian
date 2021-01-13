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

    public function penelitian()
    {        
        $penelitian = PenelitianModel::paginate(6);
        return view("user.penelitian", compact("penelitian"));
    }

    public function aplikasi()
    {
        return view("user.aplikasi");
    }
}

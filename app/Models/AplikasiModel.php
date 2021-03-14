<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AplikasiModel extends Model
{
    //use HasFactory;

    protected $table = "tbl_aplikasi";

    protected $hidden = [
        "created_at",
        "updated_at"
    ];

    protected $fillable = [
        "url",
        "nama",
        "deskripsi"
    ];
}

<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenelitianModel extends Model
{
    //use HasFactory;
    protected $table = "tbl_penelitian";

    protected $hidden = [
        "created_at",
        "updated_at"
    ];

    protected $fillable = [
        "judul",
        "abstrak",
        "penulis",
        "nrp",
        "tahun",
        "kata_kunci",
        "file"    
    ];
}

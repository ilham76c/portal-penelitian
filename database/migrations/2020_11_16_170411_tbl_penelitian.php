<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblPenelitian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */    

    public function up()
    {
        Schema::create("tbl_penelitian", function(Blueprint $table) {
            $table->increments("id");            
            $table->text("judul");
            $table->text("abstrak");
            $table->string("penulis");
            $table->char("nrp", 12);
            $table->string("tahun");  
            $table->string("kata_kunci");          
            $table->text("file");
            $table->timestamps();
            $table->engine = "InnoDB";
            $table->collation = "utf8mb4_unicode_ci";
        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tbl_penelitian');
    }
}

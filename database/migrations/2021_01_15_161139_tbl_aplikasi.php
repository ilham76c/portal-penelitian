<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblAplikasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("tbl_aplikasi", function(Blueprint $table) {
            $table->increments("id");            
            $table->text("url");
            $table->text("nama");
            $table->text("deskripsi");            
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
        Schema::drop('tbl_aplikasi');
    }
}

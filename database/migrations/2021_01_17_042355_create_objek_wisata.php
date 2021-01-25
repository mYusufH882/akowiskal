<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObjekWisata extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objek_wisata', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nama_lain');
            // $table->integer('kode_prov');
            // $table->integer('kode_kab');
            // $table->integer('kode_kec');
            // $table->integer('kode_desa');
            $table->text('deskripsi');
            $table->text('cara_tempuh');
            $table->text('fasilitas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('objek_wisata');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ObjekWisata extends Model
{
    protected $table = 'objek_wisata';

    protected $fillable = ['nama', 'nama_lain', 'deskripsi', 'cara_tempuh', 'fasilitas'];
}

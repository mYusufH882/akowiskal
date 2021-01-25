<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lampiran extends Model
{
    protected $table = 'lampiran';

    protected $fillable = ['lamp_judul', 'lamp_deskripsi', 'lamp_alamat', 'lamp_gambar', 'lamp_referensi'];
}

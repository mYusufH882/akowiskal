<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class owKategori extends Model
{
    protected $table = 'ow_kategori';

    protected $fillable = ['id_ow', 'id_kategori'];
}

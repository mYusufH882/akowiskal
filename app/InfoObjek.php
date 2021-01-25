<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoObjek extends Model
{
    protected $table = 'info_objek';

    protected $fillable = ['id_ow', 'info_narasi', 'info_sumber'];
}

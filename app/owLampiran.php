<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class owLampiran extends Model
{
    protected $table = 'ow_lampiran';

    protected $fillable = ['id_ow', 'id_lampiran'];
}

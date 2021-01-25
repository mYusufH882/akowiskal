<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoLamp extends Model
{
    protected $table = 'lamp_info_objek';

    protected $fillable = ['id_ow', 'id_info'];
}

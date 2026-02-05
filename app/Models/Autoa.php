<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Autoa extends Model
{
    //

    public function jabea() {
        return $this->belongsTo(Erabiltzailea::class, 'erabiltzaile_id');
    }
}

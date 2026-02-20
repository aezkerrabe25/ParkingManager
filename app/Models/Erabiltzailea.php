<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Erabiltzailea extends Model
{
    protected $table = 'erabiltzaileak';

    public function autoak() {
        return $this->hasMany(Autoa::class, 'erabiltzaile_id');
    }
}

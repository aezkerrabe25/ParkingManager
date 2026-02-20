<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Autoa extends Model
{
    protected $table = 'autoak';

    protected $fillable = [
        'marka',
        'modeloa',
        'matrikula',
        'urtea',
        'erabiltzaile_id',
    ];

    public function jabea() {
        return $this->belongsTo(Erabiltzailea::class, 'erabiltzaile_id');
    }
}

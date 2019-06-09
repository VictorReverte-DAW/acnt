<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Torneo extends Model
{
    protected $table="torneos";
    protected $fillable = [
        'nombre','imagenTorneo','gratis','max_jugadores','id_juego','precio','hora','fecha','estado'
    ];
}

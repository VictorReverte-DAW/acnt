<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuota extends Model
{
    protected  $primaryKey = 'id_Usuario';
    public $incrementing = false;
    protected $fillable = [
        "fecha_pago","total","id_Usuario",
    ];
    public function Users() {
        return $this->belongsTo('App\users',"id_Usuario");
    }
}

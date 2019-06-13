<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reunion extends Model
{
    protected $fillable = [
        "fecha","hora","asunto","estado"
    ];
    public function Users() {
        return $this->belongsToMany('App\organizadas',"id_Usuario");
    }
}

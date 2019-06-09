<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    public function Users() {
        return $this->belongsToMany('App\User','id');
    }
}

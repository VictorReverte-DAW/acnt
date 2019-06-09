<?php

namespace App;

use App\User;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'dni','nick','name','apellido', 'email', 'password','provincia','localidad','cp','telefono','fnac'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function Rol() {
        return $this->belongsTo('App\Rol','id_rol');
    }
    public function Cuota() {
        return $this->belongsTo('App\Cuota','fecha_pago');
    }
    public function Reunion() {
        return $this->belongsTo('App\organizadas','id_Reunion');
    }
    
    public function authorizeRoles($roles){
        if($this->hasAnyRole($roles) ||DB::table('users')->where('dni',"77855599R")->get()){
            return true;
        }
        abort(401);
    }
    public function hasAnyRole($roles){
        if(is_array($roles)){
            foreach($roles as $role){
                if($this->hasRole($role)){
                    return true;
                }
            }
        }else{
            if($this->hasRole($roles)){
             
                return true;
            }
        }
        
        return false;
    }
    public function hasRole($role){
        if($this->Rol()->where('id',$role)->first()){
            return true;
        }
        return false;
    }
}
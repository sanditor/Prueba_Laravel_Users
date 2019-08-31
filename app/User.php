<?php

namespace App;

use Illuminate\Notifications\Notifiable;
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
        'role','name', 'username','email', 'city', 'hobbies', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function hobbie() {
        return $this->hasMany('App\Hobbie');
    }

    public function roles() {
        return $this->belongsToMany('App\Role');
    }

    //Quien va desencadenar todo el proceso, recibe los roles
    public function authorizeRoles($roles){
        if($this->hasAnyRole($roles)){
            return true;
        }
             abort(401, 'No tienes permiso para esta funcionalidad!!');
    }

    //arreglo de errores
    public function hasAnyRole($roles){
        //si viene de un arreglo
        if(is_array($roles)){
            foreach ($roles as $role) {
                if($this->hasRole($role)) {
                    return true;
                }
            }
        }else{
            //si no es un array retorna un true
            if($this->hasRole($roles)) {
                return true;
            }
        }
        //no entrar a ninguna condicion anterior
        return false;
    }

    //validar si un usuario contiene un rol asignado
    public function hasRole($role) {
        if($this->roles()->where('name',$role)->first()) {
            return true;
        }
            return false;
      }


}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hobbie extends Model
{
    protected $table = 'hobbies';

    public function user() {

        //relacion de muchos a uno
        return $this->belongsTo('App\User', 'user_id');

    }
}

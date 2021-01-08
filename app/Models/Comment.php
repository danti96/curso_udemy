<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    /** 
     * Indicar que estamos usando una relacion polimorficas
     * able
     */
    
    public function commentable(){
        return $this->morphTo();
    }

    /** Relacion uno a muchos polimorficas */
    public function comments(){
        return $this->morphMany('App\Models\Commet','commentable');
    }

    public function reactions(){
        return $this->morphMany('App\Models\Reaction','reactionable');
    }

    /** Relacion uno a muchos inversa*/
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}

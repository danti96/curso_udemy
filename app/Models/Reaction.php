<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{
    
    /** Bloquear el campo id */
    protected $guarded = ['id']; 
    
    use HasFactory;

    const LIKE = 1;
    const DISLIKE = 2;
    
    /** 
     * Indicar que estamos usando una relacion polimorficas
     * able
     */
    
    public function reactiontable(){
        return $this->morphTo();
    }
    
    /** Relacion uno a muchos inversa*/
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}

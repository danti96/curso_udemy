<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;
    const BORRADOR = 1;
    const REVISION = 2;
    const PUBLICADO = 3;

    
    /** Relacion uno a muchos */
    public function reviews(){
        return $this->hasMany('App\Models\Review');
    }
    
    /** Relación uno a muchos Inversa 
     * usuario que ha dictado el curso
     * eloquent me va a buscar en la tabla course el campo teacher_id
     * para ser explicito le indicamos que es 'user_id'
    */
    public function teacher(){
        return $this->belongsTo('App\Models\Users','user_id');
    }
    
    /** Relación uno a muchos 
     * los estudiantes que tenga este curso
    */
    public function students(){
        return $this->belongsToMany('App\Models\Users');
    }
}

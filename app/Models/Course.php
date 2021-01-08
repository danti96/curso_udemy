<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    const BORRADOR = 1;
    const REVISION = 2;
    const PUBLICADO = 3;

    
    /** Relacion uno a muchos */
    public function reviews(){
        return $this->hasMany('App\Models\Review');
    }
    
    public function requirements(){
        return $this->hasMany('App\Models\Requirements');
    }
    
    public function goals(){
        return $this->hasMany('App\Models\Goal');
    }
    
    public function audience(){
        return $this->hasMany('App\Models\Audience');
    }
    
    public function section(){
        return $this->hasMany('App\Models\Section');
    }
    /** Relación uno a muchos Inversa 
     * usuario que ha dictado el curso
     * eloquent me va a buscar en la tabla course el campo teacher_id
     * para ser explicito le indicamos que es 'user_id'
    */
    public function teacher(){
        return $this->belongsTo('App\Models\User','user_id');
    }
    
    public function level(){
        return $this->hasMany('App\Models\Level');
    }
    
    public function category(){
        return $this->hasMany('App\Models\Category');
    }
    
    public function price(){
        return $this->hasMany('App\Models\Price');
    }
    /** Relación uno a muchos 
     * los estudiantes que tenga este curso
    */
    public function students(){
        return $this->belongsToMany('App\Models\User');
    }

    /** Relacion uno a uno Polimorfica */

    public function image(){
        return $this->morphOne('App\Models\Image','imageable');
    }
    
    /** Relacion de curso con lesson */
    public function lessons(){
        return $this->hasManyThrough('App\Models\Lesson','App\Models\Lesson');
    }
}

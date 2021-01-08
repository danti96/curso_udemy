<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    
    /** Bloquear el campo id */
    protected $guarded = ['id']; 
    
    use HasFactory;

    /**Relacion uno a muchos */
    public function lesson(){
        return $this->hasMany('App\Models\Lesson');
    }

    /** Relacion uno a muchos inversa */
    public function course(){
        return $this->belongsTo('App\Models\Course');
    }
}

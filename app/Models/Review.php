<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    
    /** Bloquear el campo id */
    protected $guarded = ['id']; 
    
    use HasFactory;
    /** Relacion uno a muchos Inversa*/
    public function reviews(){
        return $this->belongsTo('App\Models\Review');
    }

    public function course(){
        return $this->belongsTo('App\Models\Course');
    }
}

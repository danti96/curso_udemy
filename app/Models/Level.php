<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    
    /** Bloquear el campo id */
    protected $guarded = ['id']; 
    
    use HasFactory;
    
    /** relacion uno a muchos */
    public function course(){
        return $this->hasMany('App\Models\Course');
    }
}

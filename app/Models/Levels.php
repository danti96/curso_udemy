<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Levels extends Model
{
    use HasFactory;
    
    /** relacion uno a muchos */
    public function course(){
        return $this->hasMany('App\Models\Course');
    }
}

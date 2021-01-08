<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    /** Relacion uno a unoo */
    public function description(){
        return $this->hasOne('App\Models\Descriptions');
    }

    /** Relacion uno a muchos inversa */
    public function section(){
        return $this->belongsTo('App\Models\Section');
    }

    public function platform(){
        return $this->belongsTo('App\Models\Platform');
    }
    
    /** Relacion muchos a muchos */
    public function user() {
        return $this->belongsToMany('App\Models\User');
    }
}
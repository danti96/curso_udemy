<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profiles extends Model
{
    use HasFactory;
    
    /** Relación uno a uno Inversa con User*/
    public function user(){
        return $this->belongsTo('App\Models\Users');
    }
}

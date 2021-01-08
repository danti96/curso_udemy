<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    
    /** Bloquear el campo id */
    protected $guarded = ['id']; 
    
    use HasFactory;
    
    /** Relación uno a uno Inversa con User*/
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}

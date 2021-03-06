<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    
    /** Bloquear el campo id */
    protected $guarded = ['id']; 
    
    use HasFactory;
    
    /** 
     * Indicar que estamos usando una relacion polimorficas
     * able
     */
    
    public function resourcetable(){
        return $this->morphTo();
    }
}

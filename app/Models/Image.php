<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    
    /** Bloquear el campo id */
    protected $guarded = ['id']; 
    
    use HasFactory;
    
    /** 
     * Indicar que estamos usando una relacion polimorficas
     * able
     */
    
    public function imagetable(){
        return $this->morphTo();
    }
}

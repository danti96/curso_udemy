<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    
    /** 
     * Indicar que estamos usando una relacion polimorficas
     * able
     */
    
    public function imagetable(){
        return $this->morphTo();
    }
}

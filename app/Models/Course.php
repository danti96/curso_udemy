<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    
    /** Bloquear el campo id 
     * Si no protego el campo status, podrian crear el campo status y
     * aprobarse el curso si que pase por un administrador 
     *
     * Esto lo realiza eloquents, me da el numero de usuarios registrados
     * en un curso, que es igual decir, $course->students->count()
     * @$withCount = ['students'];
     * 
     * Si quieres saber más puedes ir a la documentación a Laravel en la sección de relaciones.
    */
    protected $guarded = ['id', 'status']; 
    protected $withCount = ['students', 'reviews'];

    use HasFactory;
    const BORRADOR = 1;
    const REVISION = 2;
    const PUBLICADO = 3;

    /**
     * Retorna la colección de review dejados por el usuarios
     */
    public function getRatingAttribute(){
        if($this->reviews_count){
            //reviews() devuelve el tipo de relación mas no la coleccion
            //avg obtiene el promedio 
            return round($this->reviews->avg('rating'), 1);
        }else{
            // Si no tiene calificaciones nos devuelve el valor de 5
            return 5;
        }
    }    


    /** Relacion uno a muchos */
    public function reviews(){
        return $this->hasMany('App\Models\Review');
    }
    
    public function requirements(){
        return $this->hasMany('App\Models\Requirement');
    }
    
    public function goals(){
        return $this->hasMany('App\Models\Goal');
    }
    
    public function audiences(){
        return $this->hasMany('App\Models\Audience');
    }
    
    public function sections(){
        return $this->hasMany('App\Models\Section');
    }
    /** Relación uno a muchos Inversa 
     * usuario que ha dictado el curso
     * eloquent me va a buscar en la tabla course el campo teacher_id
     * para ser explicito le indicamos que es 'user_id'
    */
    public function teacher(){
        return $this->belongsTo('App\Models\User','user_id');
    }
    
    public function level(){
        return $this->hasMany('App\Models\Level');
    }
    
    public function category(){
        return $this->hasMany('App\Models\Category');
    }
    
    public function price(){
        return $this->hasMany('App\Models\Price');
    }
    /** Relación uno a muchos 
     * los estudiantes que tenga este curso
    */
    public function students(){
        return $this->belongsToMany('App\Models\User');
    }

    /** Relacion uno a uno Polimorfica */

    public function image(){
        return $this->morphOne('App\Models\Image', 'imageable');
    }
    
    /** Relacion de curso con lesson */
    //Relacion hasManyThrough
    public function lessons(){
        return $this->hasManyThrough('App\Models\Lesson', 'App\Models\Section');
    }
}

<?php

namespace App\Policies;

use App\Models\Course;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Foundation\Auth\User as AuthUser;

class CoursePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Verificar si un usuario tiene los permisos de ver o no ver algo
     * recuerperar el registro del usuario autentificado
     * metodo para el uso @can
     * contains verifica si el id del usuario si se encuentra a traves
     * de la relacion students
     */
    public function enrolled(User $user, Course $course){
        return $course->students->contains($user->id);
    }
}

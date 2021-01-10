<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class HomeController extends Controller
{
    /**
     * Este controlador solo va administrar una unica ruta
     * __invoke () metodo
     */
    
    public function __invoke(){
        //return Course::find(4)->rating;
        // lastest es el sort o orderby desc
        $course = Course::where('status',3)->latest('id')->get();

        return view('welcome', compact('course'));
    }
}

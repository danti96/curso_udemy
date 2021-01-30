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
        $coursers = Course::where('status',3)->latest('id')->get()->take(12);

        return view('welcome', compact('coursers'));
    }
}

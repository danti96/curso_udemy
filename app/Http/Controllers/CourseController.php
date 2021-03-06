<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
class CourseController extends Controller
{
    
    public function index(){
        return view('courses.index');
    }

    public function show(Course $course){
        //CoursePolicy
        $this->authorize('published', $course);

        
        $similares = Course::where('category_id', $course->category_id)
                            ->where('id', '!=', $course->id)
                            ->where('status', 3) //publicado
                            ->latest('id') //ordenado
                            ->take(5) //limit
                            ->get();


        return view('courses.show', compact('course', 'similares'));
    }

    /**
     * Registrar usuario con el curso al presionar el boton "llevar curso"
     * tabla course_user
     */
    public function enrolled(Course $course){
        $course->students()->attach(auth()->user()->id);
        return redirect()->route('courses.status',$course);
    }

}

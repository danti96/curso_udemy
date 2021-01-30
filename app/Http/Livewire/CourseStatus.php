<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Course;
use App\Models\Lesson;

class CourseStatus extends Component
{
    public $course, $current;
    /**
     * Cuando se carga la pagina por primera vez
     * con las propiedades de una forma estatica
     */
    public function mount(Course $course){
        $this->course = $course;

        /**
         * obtener la Lesson actual
         */
        foreach ($course->lessons as $lesson) {
            if(!$lesson->completed){
                $this->current = $lesson;

                break;
            }
        }
    }
    
    public function render()
    {
        return view('livewire.course-status');
    }
    
    /**
     * Actualizar el componente cuando se cambia de capitulo 
     * ejecuta el metodo render, 
     */
    public function changeLesson(Lesson $lesson){
        $this->current = $lesson;
    }

    /**
     * recupera la propiedad course, y pide que recupere todas las lesson
     * pluck crea un conjunto de id
     */
    public function getIndexProperty(){
        return $this->course->lessons->pluck('id')->search($this->current->id);
    }

    public function getPreviousProperty(){
        //previous
        if ($this->index == 0) {
            return null;
        }else{
            return $this->course->lessons[$this->index - 1];
        }
    }

    public function getNextProperty(){
        //next
        if ($this->index == $this->course->lessons->count() - 1) {
            return null;
        }else{
            return $this->course->lessons[$this->index + 1];
        }
    }
}

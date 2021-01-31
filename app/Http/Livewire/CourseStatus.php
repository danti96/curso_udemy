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

        /**
         * Si actualmente la propiedad current no ha sido asignada
         * se le asigna la ultima propiedad
         **/

        if(!$this->current){
            $this->current = $course->lessons->last();
        }

    }
    
    public function render()
    {
        return view('livewire.course-status');
    }

    /**
     * Metodos
     * Actualizar el componente cuando se cambia de capitulo, ejecuta el metodo render, 
     */
    public function changeLesson(Lesson $lesson){
        $this->current = $lesson;
    }
    
    public function completed(){
        if ($this->current->completed) {
            //Eliminar registro
            $this->current->users()->detach(auth()->user()->id);
        }else{
            //Agregar registro
            $this->current->users()->attach(auth()->user()->id);
        }
        $this->current = Lesson::find($this->current->id);

        $this->course = Course::find($this->course->id);
    }


    /**
     *  Propiedades Computadas
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

    public function getAdvanceProperty(){
        //Porcentaje del curso
        $i = 0;
        foreach ($this->course->lessons as $lesson) {
            if($lesson->completed){
                $i++;
            }
        }

        $advance = ($i * 100)/($this->course->lessons->count());
        
        return round($advance, 2);
    }
}

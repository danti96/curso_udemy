<?php

namespace Database\Seeders;

use App\Models\Audience;
use App\Models\Course;
use App\Models\Description;
use App\Models\Goal;
use App\Models\Image;
use App\Models\Lesson;
use App\Models\Requirement;
use App\Models\Section;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /** llamos el factory courseFactory para crear cursos */
        $courses = Course::factory(100)->create();

        foreach($courses as $course){
            /** LLamamos al modelo Image, LLamamos al metodo factory para que 
             * nos genere un imagen desde el factory, se genera una image y 
             * la ruta donde se guardara la imagen.
             * 1 genera los cursos,
             * 2 Descargo las imagenes
             * 3 Almacenar en table image
             * de aqui a databaseseeder para que llame a CourseSeeder y genere la
             * migración
            */
            
            Image::factory(1)->create([
                'imageable_id'=> $course->id,
                'imageable_type'=> 'App\Models\Course',
            ]);
             
            Requirement::factory(4)->create([
                'course_id'=>$course->id
            ]);

            Goal::factory(4)->create([
                'course_id'=>$course->id
            ]);
            
            Audience::factory(4)->create([
                'course_id'=>$course->id
            ]);

            /** Recuperar los id de las secciones */   
            $sections = Section::factory(4)->create([
                'course_id'=>$course->id
            ]);

            /** Crear la sección y añadirlo a las lesiones */
            foreach ( $sections as $section ){
                $lessons = Lesson::factory(4)->create([
                    'section_id' => $section->id
                    ]);
                /** Crear la descripcion y añadirle el lesson id*/
                foreach ($lessons as $lesson) {
                    Description::factory(1)->create([
                        'lesson_id' => $lesson->id
                    ]);
                }
            }
        }
    }
}

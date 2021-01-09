<?php

namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Image::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            /** Se indica el tamaño del ancho y alto
             * En versiones inferiores a laravel 8,
             * Se podria escoger la categoria que podria pertenecer la imagen
             * En laravel 8, cuando se solicita a que categoria quieres que 
             * permanezca esta imagen, le colocamos null, y luego nos pide un 
             * bool
             * Si colocamos true: se guardaria de esta manera
             * /public/storage/cursos/image.jpg
             * si es false:
             * image.jpg
             * Lo que queremos que almacen en nuestra BD:
             * cursos/image.jpg
             * asi que lo concatenamos
             */

            'url'=> 'cursos/'.$this->faker->image('storage/app/cursos', 640, 480, null, false),
            /* 'imageable_id' => null,
            'imageable_type' => null */
        ];
    }
}

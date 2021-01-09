<?php

namespace Database\Factories;

use App\Models\Lesson;
use Illuminate\Database\Eloquent\Factories\Factory;

class LessonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lesson::class;

    /**
     * Define the model's default state.
     *
     * @return array
     * 
     * de aqui volvemos a courseSeeder para agregarle las section
     */
    public function definition()
    {
        return [
            'name'=> $this->faker->sentence(),
            'url'=> 'https://youtu.be/30m18nDJ8S0',
            'iframe'=> '<iframe width="560" height="315" src="https://www.youtube.com/embed/30m18nDJ8S0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'platform_id'=> 1
        ];
    }
}

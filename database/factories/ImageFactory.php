<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=> $this->faker->sentence(),
            'url'=> 'cursos/'.$this->faker->image('public/storage/cursos', 640, 480, null, false),
        ];
    }
}

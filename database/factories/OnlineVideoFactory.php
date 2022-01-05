<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OnlineVideoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(),
            'url' => 'https://youtu.be/A-BL8Ir7puE',
            'iframe'=> '<iframe width="560" height="315" src="https://www.youtube.com/embed/A-BL8Ir7puE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
        ];
    }
}

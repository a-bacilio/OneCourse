<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'age' => $this->faker->randomDigit()*10 + $this->faker->randomDigit(),
            'gender' => $this->faker->randomElement(['masculino','femenino']),
            'education_level' => $this->faker->randomElement(['sin estudios', 'primaria incompleta', 'primaria completa', 'secundaria incompleta', 'secundaria completa', 'tecnico incompleto', 'tecnico completo', 'universitario incompleto', 'universitario completo']),
            'civil_status' => $this->faker->randomElement(['soltero','conviviente','casado','divorciado','viudo']),
            'ocupppation' => $this->faker->randomElement(['hogar','trabajador independiente','trabajador dependiente','desempleado','estudiante']),
            'birth_place' => $this->faker->sentence(3),
            'residence_state' => $this->faker->country(),
            'residence_province' => $this->faker->state(),
            'residence_district' => $this->faker->city(),
            'covid_family' => $this->faker->boolean(),
            'caretaker_you' => $this->faker->boolean(),
            'caretaker_pro' => $this->faker->boolean(),
        ];
    }
}

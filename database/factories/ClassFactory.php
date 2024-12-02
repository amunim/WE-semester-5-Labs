<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClassFactory extends Factory
{
    public function definition()
    {
        return [
            'teacherid' => $this->faker->numberBetween(1, 10),
            'starttime' => $this->faker->dateTime(),
            'endtime' => $this->faker->dateTime(),
            'credit_hours' => $this->faker->numberBetween(1, 5),
        ];
    }
}

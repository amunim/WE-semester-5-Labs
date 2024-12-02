<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AttendanceFactory extends Factory
{
    public function definition()
    {
        return [
            'classid' => $this->faker->numberBetween(1, 10),
            'studentid' => $this->faker->numberBetween(1, 50),
            'isPresent' => $this->faker->boolean(),
            'comments' => $this->faker->sentence(),
            'marked_at' => $this->faker->dateTimeThisYear(),
        ];
    }
}

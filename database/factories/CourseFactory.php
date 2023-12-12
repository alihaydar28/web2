<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    protected $model = Course::class;

    public function definition()
    {
        return [
            'CourseCode' => $this->faker->unique()->bothify('COURSE##'),
            'CourseName' => $this->faker->sentence(3),
            'CourseDescription' => $this->faker->paragraph,
            'CourseCredit' => rand(1, 3),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

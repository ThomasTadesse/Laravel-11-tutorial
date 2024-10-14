<?php

namespace Database\Factories;

use App\Models\Employer;
use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    protected $model = Job::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->jobTitle(), // Generates a job title
            'employer_id' => Employer::factory(), // Links to an Employer
            'description' => $this->faker->paragraph(), // Generates a paragraph for job description
        ];
    }
}

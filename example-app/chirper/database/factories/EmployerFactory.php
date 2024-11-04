<?php

namespace Database\Factories;

use App\Models\Employer;
use App\Models\Job;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employer>
 */
class EmployerFactory extends Factory
{
   
    protected $model = Employer::class;

    public function definition(): array
    {
        return [
            'name' => fake()->company(),
            'user_id' => User::factory()
        ];
    }
}

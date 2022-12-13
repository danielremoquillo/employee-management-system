<?php

namespace Database\Factories;

use Faker\Core\DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'employee_id' => random_int(1, 10),
            'project_name' => strtoupper(fake()->word()),
            'project_due' =>  date('2023-12-29'),
            'project_sub' =>  date('2022-12-29'),
            'project_status' =>   'Submitted', // due and submitted
        ];
    }
}

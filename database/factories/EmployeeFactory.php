<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $degrees = ['Professional Degree', 'Bachelor Degree', 'Master Degree', 'Doctoral Degree'];
        $genders = ['Male', 'Female'];


        return [
            //
            'employee_name' => fake()->name(),
            'employee_email' => fake()->unique()->safeEmail(),
            'employee_bday' => fake()->date(),
            'employee_gender' => $genders[random_int(0, 1)],
            'employee_address' => fake()->address(),
            'employee_degree' => $degrees[random_int(0, 3)],
            'position_id' => random_int(1, 5)

        ];
    }
}

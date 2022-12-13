<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class LeaveFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'employee_id' => random_int(1, 10),
            'leave_start' => date('2022-12-05'),
            'leave_end' => date('2022-12-10'),
            'leave_reason' => implode('', fake()->words(5)),
        ];
    }
}

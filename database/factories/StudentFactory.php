<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
{
    return [
        'student_id' => 'STU'.$this->faker->unique()->numberBetween(10000,99999),
        'first_name' => $this->faker->firstName,
        'last_name' => $this->faker->lastName,
        'birthdate' => $this->faker->date(),
        'gender' => $this->faker->randomElement(['Male','Female']),
        'email' => $this->faker->unique()->safeEmail(),        'phone' => $this->faker->phoneNumber,
        'address' => $this->faker->address,
        'department' => $this->faker->randomElement([
            'Computer Science',
            'Business Administration',
            'Education',
            'Engineering',
            'Nursing'
        ]),
        'year_level' => $this->faker->numberBetween(1,4),
    ];
}

}

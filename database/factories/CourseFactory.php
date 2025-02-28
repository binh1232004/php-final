<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $subjects = ['Toán', 'Tiếng anh', 'Ngữ văn'];
        $grades = ['10', '11', '12'];
        
        return [
            'name' => fake()->sentence(3),
            'subject' => fake()->randomElement($subjects),
            'grade' => fake()->randomElement($grades),
            'price' => fake()->numberBetween(100000, 1000000), 
        ];
    }
}

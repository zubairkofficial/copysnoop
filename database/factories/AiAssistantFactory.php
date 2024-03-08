<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AiAssistant>
 */
class AiAssistantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id'=>$this->faker->numberBetween(1,10),
            'name'=>$this->faker->name(),
            'slug'=>$this->faker->slug(),
            'status'=>$this->faker->randomElement(['active','inactive']),
            'title'=>$this->faker->sentence(),
            'prompt'=>$this->faker->text()
        ];
    }
}

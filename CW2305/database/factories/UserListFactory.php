<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserList>
 */
class UserListFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>$this->faker->userName(),
            'email'=>$this->faker->email(),
            'phone'=>$this->faker->e164PhoneNumber(),
            'age'=>$this->faker->numberBetween(18,88),
            'created_at'=>$this->faker->dateTime(),
            'updated_at'=>$this->faker->dateTime()
        ];
    }
}

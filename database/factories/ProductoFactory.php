<?php

namespace Database\Factories;

use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->firstNameMale,
            'description'=>$this->faker->sentence(5),
            'price'=>$this->faker->randomElement(['30','40','50','60','70','80','90']),
        ];
    }
}

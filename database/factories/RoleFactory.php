<?php

namespace Database\Factories;

use Inggo\Spel\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Role::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'key'  => $this->faker->slug(),
            'name' => $this->faker->name(),
        ];
    }
}

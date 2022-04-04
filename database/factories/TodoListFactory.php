<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\TodoList;
use Illuminate\Database\Eloquent\Factories\Factory;

class TodoListFactory extends Factory
{
    protected $model = TodoList::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence,
            'user_id' => function () {
                return User::factory()->create()->id;
            }
        ];
    }
}

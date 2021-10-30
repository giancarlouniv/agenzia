<?php

namespace Database\Factories;

use App\Models\HousePerson;
use Illuminate\Database\Eloquent\Factories\Factory;

class HousePersonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = HousePerson::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'house_id' => rand(1,200),
            'person_id' => rand(1,200)
        ];
    }
}

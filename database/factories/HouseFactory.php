<?php

namespace Database\Factories;

use App\Models\House;
use Illuminate\Database\Eloquent\Factories\Factory;

class HouseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = House::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => rand(1,4),
            'person_id' => rand(1,50),
            'is_archiviato' => rand(0,1),
            'contract_id' => rand(1,2),
            'house_type_id' => rand(1,5),
            'city' => $this->faker->city(),
            'address' => $this->faker->address(),
            'vani' => rand(1,6),
            'mq' => rand(70,140),
            'piano' => rand(1,8),
            'is_ascensore' => rand(0,1),
            'latitude' => $this->faker->latitude(),
            'longitude' => $this->faker->longitude(),
            'img_path' => $this->faker->filePath(),
            'note' => $this->faker->text(),
            'prezzo' => $this->faker->numberBetween(1500, 6000),
        ];
    }
}

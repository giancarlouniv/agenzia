<?php

namespace Database\Factories;

use App\Models\HouseCustomer;
use Illuminate\Database\Eloquent\Factories\Factory;

class HouseCustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = HouseCustomer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'house_id' => rand(1,50),
            'customer_id' => rand(1,20)
        ];
    }
}

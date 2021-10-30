<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => rand(1,2),
            'customer_type_id' => rand(1,4),
            'name' => $this->faker->firstName(),
            'surname' => $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail(),
            'data_birthday' => $this->faker->date(),
            'phone' => $this->faker->phoneNumber(),
            'phone2' => $this->faker->phoneNumber(),
            'note_phone' => $this->faker->text(),
            'note_phone2' => $this->faker->text(),
        ];
    }
}

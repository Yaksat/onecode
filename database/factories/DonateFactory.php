<?php

namespace Database\Factories;

use App\Models\Currency;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class DonateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $currencies = Currency::query()->get();
        $currencies->random()->id;

        return [
            'created_at' => $this->faker->dateTimeBetween(now()->subDays(1000), now()),
            'currency_id' => $currencies->random()->id,
            'amount' => rand(1, 1000),
        ];
    }
}

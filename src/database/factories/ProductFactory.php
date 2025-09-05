<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{

    protected $model = \App\Models\Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        'name' => $this->faker->word(),   // 後でSeederで上書き可
            'price' => $this->faker->numberBetween(500, 1500),
            'description' => $this->faker->sentence(),
            'season' => '春', // デフォルト
            'image' => 'kiwi.png', // 仮の画像
        ];
    }
}

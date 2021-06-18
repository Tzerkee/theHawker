<?php

namespace Database\Factories;

use App\Models\Shop;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShopFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Shop::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(2,false),
            'image' => $this->faker->imageUrl('480', '200'),
            'description' => $this->faker->paragraph,
            'is_active' => $this->faker->randomElement([true,false]),
            'user_id' => $this->faker->randomElement(User::pluck('id')->toArray()),
        ];
    }
}

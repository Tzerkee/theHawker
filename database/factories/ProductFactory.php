<?php

namespace Database\Factories;

use App\Models\Shop;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(3,false),
            'slug' => $this->faker->slug,
            'summary' => $this->faker->sentence(10,false),
            'description' => $this->faker->paragraph,
            'image' => $this->faker->imageUrl('400', '200'),
            'images' => $this->faker->imageUrl('400', '200'),
            'price' => $this->faker->randomFloat(2, 10, 100),
            'stock' => $this->faker->numberBetween(2,10),
            'publish' => $this->faker->randomElement([true,false]),
            'shop_id' => $this->faker->randomElement(Shop::pluck('id')->toArray()),
            'cat_id' => $this->faker->randomElement(Category::where('is_parent',1)->pluck('id')->toArray()),
            'child_cat_id' => $this->faker->randomElement(Category::where('is_parent',0)->pluck('id')->toArray())
        ];
    }
}

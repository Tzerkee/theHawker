<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'slug' => $this->faker->slug,
            'image' => $this->faker->imageUrl('100', '100'),
            'is_parent' => $this->faker->randomElement([true,false]),
            'description' => $this->faker->paragraph,
            'publish' => $this->faker->randomElement([true,false]),
            'parent_id' => $this->faker->randomElement(Category::pluck('id')->toArray()),
        ];
    }
}

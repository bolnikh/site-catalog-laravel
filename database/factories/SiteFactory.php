<?php

namespace Database\Factories;

use App\Models\Site;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class SiteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Site::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => Category::factory(),
            'url' => $this->faker->url,
            'title' => $this->faker->word(2),
            'description' => $this->faker->sentence,
            'long_description' => $this->faker->paragraph,
        ];
    }
}

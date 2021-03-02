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
        static $last_category;

        if (is_null($last_category)) {
            $last_category = Category::factory();
        }

        if (mt_rand(0, 100) < 20) {
            $last_category = Category::factory();
        }

        return [
            'category_id' => $last_category,
            'url' => $this->faker->url,
            'title' => $this->faker->sentence(mt_rand(2,5)),
            'description' => $this->faker->sentence,
            'long_description' => $this->faker->paragraph,
        ];
    }
}

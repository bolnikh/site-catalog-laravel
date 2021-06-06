<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Site;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Category::factory()
            ->count(mt_rand(10, 20))
            ->create();

        foreach (Category::all() as $cat) {
            Category::factory()
                ->count(mt_rand(2, 10))
                ->create([
                    'parent_id' => $cat,
                    'depth' => 1,
                ]);

                }

        foreach (Category::where('depth', 1)->get() as $cat1) {
            Category::factory()
                ->count(mt_rand(0, 10))
                ->create([
                    'parent_id' => $cat1,
                    'depth' => 2,
                ]);
        }

        for ($i = 0; $i < 10000; $i++) {
            Site::factory()
                ->create([
                    'category_id' => Category::all()->random()
                ]);
        }



    }
}

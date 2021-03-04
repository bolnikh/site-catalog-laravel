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
            ->count(30)
            ->create();

        foreach (Category::orderBy('id')->get() as $cat) {
            if ($cat->parent) {
                $cat->depth = $cat->parent->depth + 1;
                $cat->save();
            }
        }

        for ($i = 0; $i < 10000; $i++) {
            Site::factory()
                ->create([
                    'category_id' => Category::all()->random()
                ]);
        }


        foreach (Category::all() as $cat) {
            $cat->update([
                'has_sites' => $cat->countAllSites()
            ]);
        }
    }
}

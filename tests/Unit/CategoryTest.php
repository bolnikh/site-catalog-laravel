<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

use Tests\TestCase;

use App\Models\Category;
use App\Models\Site;

class CategoryTest extends TestCase
{
    use RefreshDatabase, WithFaker;


    public function setUp(): void
    {
        parent::setUp();
    }

    public function test_create_category()
    {
        $name1 = $this->faker->word;
        $name2 = $this->faker->word;

        $cat1 = Category::factory()
            ->create(
                [
                    'name' => $name1,
                    'parent_id' => null
                ]
            );

        $cat2 = Category::factory()
            ->create(
                [
                    'name' => $name2,
                    'parent_id' => $cat1
                ]
            );

        $this->assertEquals($name1, $cat1->name);
        $this->assertEquals($name2, $cat2->name);

        $this->assertEquals($name1, $cat2->parent->name);
        $this->assertNull($cat1->parent);
    }


    public function test_category_sites()
    {
        $cat1 = Category::factory()
            ->create(
                [
                    'name' => $this->faker->word,
                    'parent_id' => null
                ]
            );

        $this->assertEmpty($cat1->sites()->first());

        $site = Site::factory()
            ->create([
                'category_id' => $cat1
            ]);

        $this->assertEquals($site->category_id, $cat1->sites[0]->category_id);

    }


    public function test_countSites()
    {
        $cat1 = Category::factory()
            ->create(
                [
                    'name' => $this->faker->word,
                    'parent_id' => null
                ]
            );

        $this->assertEquals(0, $cat1->countSites());

        Site::factory()
            ->create([
                'category_id' => $cat1
            ]);

        $this->assertEquals(1, $cat1->countSites());

        Site::factory()
            ->create([
                'category_id' => $cat1
            ]);

        $this->assertEquals(2, $cat1->countSites());

        Site::factory()
            ->count(10)
            ->create([
                'category_id' => $cat1
            ]);

        $this->assertEquals(12, $cat1->countSites());

        $cat2 = Category::factory()
            ->create(
                [
                    'name' => $this->faker->word,
                    'parent_id' => $cat1
                ]
            );

        $this->assertEquals(0, $cat2->countSites());

        Site::factory()
            ->count(10)
            ->create([
                'category_id' => $cat2
            ]);

        $this->assertEquals(10, $cat2->countSites());

    }

    public function test_parent()
    {

        $cat1 = Category::factory()
            ->create(
                [
                    'name' => $this->faker->word,
                    'parent_id' => null
                ]
            );

        $this->assertNull($cat1->parent);

        $cat2 = Category::factory()
            ->create(
                [
                    'name' => $this->faker->word,
                    'parent_id' => $cat1
                ]
            );

        $this->assertEquals($cat2->parent->id, $cat1->id);
    }


    public function test_childs() {
        $cat1 = Category::factory()
            ->create(
                [
                    'name' => $this->faker->word,
                    'parent_id' => null
                ]
            );

        $this->assertEmpty($cat1->childs);

        $cat2 = Category::factory()
            ->create(
                [
                    'name' => $this->faker->word,
                    'parent_id' => $cat1
                ]
            );

        $this->assertEquals($cat1->refresh()->childs[0]->id, $cat2->id);
    }


    public function test_getAllParents() {
        $cat1 = Category::factory()
            ->create(
                [
                    'name' => $this->faker->word,
                    'parent_id' => null
                ]
            );

        $this->assertEmpty($cat1->getAllParents());

        $cat2 = Category::factory()
            ->create(
                [
                    'name' => $this->faker->word,
                    'parent_id' => $cat1
                ]
            );

        $this->assertEquals($cat1->id, $cat2->getAllParents()[0]->id);

        $cat3 = Category::factory()
            ->create(
                [
                    'name' => $this->faker->word,
                    'parent_id' => $cat2
                ]
            );

        $this->assertEquals($cat2->id, $cat3->getAllParents()[0]->id);
        $this->assertEquals($cat1->id, $cat3->getAllParents()[1]->id);


        $cat4 = Category::factory()
            ->create(
                [
                    'name' => $this->faker->word,
                    'parent_id' => $cat3
                ]
            );

        $this->assertEquals($cat3->id, $cat4->getAllParents()[0]->id);
        $this->assertEquals($cat2->id, $cat4->getAllParents()[1]->id);
        $this->assertEquals($cat1->id, $cat4->getAllParents()[2]->id);
    }

    public function test_getAllChilds() {

        $cat1 = Category::factory()
            ->create(
                [
                    'name' => $this->faker->word,
                    'parent_id' => null
                ]
            );

        $this->assertEmpty($cat1->getAllChilds());

        $cat2 = Category::factory()
            ->create(
                [
                    'name' => $this->faker->word,
                    'parent_id' => $cat1
                ]
            );

        $cat1->refresh();


        $this->assertEmpty($cat2->getAllChilds());
        $this->assertNotEmpty($cat1->getAllChilds());

        $this->assertEquals($cat2->id, $cat1->getAllChilds()[0]->id);


        $cat3 = Category::factory()
            ->create(
                [
                    'name' => $this->faker->word,
                    'parent_id' => $cat2
                ]
            );

        $cat1->refresh();

        $this->assertEquals($cat2->id, $cat1->getAllChilds()[0]->id);
        $this->assertEquals($cat3->id, $cat1->getAllChilds()[1]->id);

        $cat4 = Category::factory()
            ->create(
                [
                    'name' => $this->faker->word,
                    'parent_id' => $cat1
                ]
            );

        $cat1->refresh();

        $this->assertEquals($cat2->id, $cat1->getAllChilds()[0]->id);
        $this->assertEquals($cat3->id, $cat1->getAllChilds()[1]->id);
        $this->assertEquals($cat4->id, $cat1->getAllChilds()[2]->id);
    }

    public function test_countAllSites() {
        $cat1 = Category::factory()
            ->create(
                [
                    'name' => $this->faker->word,
                    'parent_id' => null
                ]
            );

        $this->assertEmpty($cat1->countAllSites());

        Site::factory()
            ->create([
                'category_id' => $cat1
            ]);

        $cat2 = Category::factory()
            ->create(
                [
                    'name' => $this->faker->word,
                    'parent_id' => $cat1
                ]
            );

        Site::factory()
            ->count(10)
            ->create([
                'category_id' => $cat2
            ]);

        $this->assertEquals(11, $cat1->refresh()->countAllSites());
        $this->assertEquals(10, $cat2->refresh()->countAllSites());


        $cat3 = Category::factory()
            ->create(
                [
                    'name' => $this->faker->word,
                    'parent_id' => $cat2
                ]
            );

        $cat4 = Category::factory()
            ->create(
                [
                    'name' => $this->faker->word,
                    'parent_id' => $cat2
                ]
            );

        Site::factory()
            ->count(7)
            ->create([
                'category_id' => $cat3
            ]);

        Site::factory()
            ->count(9)
            ->create([
                'category_id' => $cat4
            ]);

        $this->assertEquals(27, $cat1->refresh()->countAllSites());
    }
}

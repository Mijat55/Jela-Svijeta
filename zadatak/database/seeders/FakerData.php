<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;


class FakerData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

     public function run()
     {

$faker = Faker::create();


// Generate categories
for ($i = 0; $i < 10; $i++) {
    DB::table('categories')->insert([
        'name' => $faker->word,
        'slug' => $faker->slug,
        'created_at' => now(),
        'updated_at' => now()
    ]);
}

// Generate tags
for ($i = 0; $i < 20; $i++) {
    DB::table('tags')->insert([
        'name' => $faker->word,
        'slug' => $faker->slug,
        'created_at' => now(),
        'updated_at' => now()
    ]);
}

// Generate ingredients
for ($i = 0; $i < 50; $i++) {
    DB::table('ingredients')->insert([
        'name' => $faker->word,
        'created_at' => now(),
        'updated_at' => now()
    ]);
}

// Generate dishes
for ($i = 0; $i < 100; $i++) {
    $category = DB::table('categories')->inRandomOrder()->first();
    $tag1 = DB::table('tags')->inRandomOrder()->first();
    $tag2 = DB::table('tags')->inRandomOrder()->first();
    $tag3 = DB::table('tags')->inRandomOrder()->first();

    DB::table('dishes')->insert([
        'name' => $faker->sentence(3),
        'description' => $faker->paragraph(4),
        'image' => $faker->imageUrl(),
        'category_id' => $category->id,
        'created_at' => now(),
        'updated_at' => now()
    ]);

    $dish_id = DB::getPdo()->lastInsertId();

    DB::table('dish_tag')->insert([
        'dish_id' => $dish_id,
        'tag_id' => $tag1->id
    ]);


    $ingredients = DB::table('ingredients')->inRandomOrder()->limit(rand(2, 6))->get();

    foreach ($ingredients as $ingredient) {
        DB::table('dish_ingredient')->insert([
            'dish_id' => $dish_id,
            'ingredient_id' => $ingredient->id,
            'quantity' => $faker->numberBetween(10, 1000),
            'unit' => $faker->randomElement(['g', 'ml', 'tsp', 'tbsp']),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
}
}
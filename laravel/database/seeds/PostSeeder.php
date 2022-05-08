<?php

use App\User;
use App\Category;
use App\Post;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\support\Str;


class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        $categories = Category::all();
        $categoriesId = $categories->pluck('id')->all();

        for($i=0; $i < 20; $i++) {

            $post = new Post();

            $post->title = $faker->words(7,true);
            $post->slug = Str::slug( $post->title );
            $post->content = $faker->paragraph(10, true);
            $post->published_at = $faker->randomElement([ null, $faker->dateTime()]);
            $post->category_id = $faker->optional()->randomElement( $categoriesId );

            $post->save();
        }
    }
}

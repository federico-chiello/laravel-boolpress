<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Post;


class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++){
            $newPost = new Post();
            $newPost->title = $faker->sentence(2);
            $newPost->content = $faker->text(300);
            $newPost->slug = Str::slug($newPost->title, '-');
            $newPost->save(); 
        }
    }
}

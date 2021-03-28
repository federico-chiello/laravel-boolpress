<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 5; $i++){
            $newTag = new Tag();
            $newTag->name = $faker->word(3, true);

            $slug = Str::slug($newTag->name);
            $slugPrincipale = $slug;
            
            $tagPresente = Tag::where('slug', $slug)->first();
            $contatore = 1;
            
            while($tagPresente){
                $slug = $slugPrincipale .'-' .$contatore;
                $tagPresente = Tag::where('slug', $slug)->first();
                $contatore++;
            }
            $newTag->slug = $slug;
            
            $newTag->save(); 
        }
    }
}
<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Post;
use App\User;


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

            //Devo controllare l'user_id
            //(1)Seleziono gli utenti, 
            //(2) la collection ottenuta viene trasformata in un array, 
            //(3) Conto quello che ho ottenuto.
            $countUser = Count(User::all()->toArray());
            $newPost->user_id = rand(1,$countUser);

            //Se viene inserito uno stesso prodotto, lo slug rimmarrà uguale a quello inserito precedentemente.
            //Per evitare ciò bisogna fare un ciclo while attraverso cui fare un controllo dello slug e se c'è incrementarlo.
            $slug = Str::slug($newPost->title);
            $slugIniziale = $slug;
            
            $postPresente = Post::where('slug', $slug)->first();
            $contatore = 1;
            
            while($postPresente){
                $slug = $slugIniziale .'-' .$contatore;
                $postPresente = Post::where('slug', $slug)->first();
                $contatore++;
            }
            $newPost->slug = $slug;
            
            $newPost->save(); 
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Comentario;
use App\Models\Posts;
use Illuminate\Database\Seeder;

class ComentariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = Posts::all();

        $posts->each(function($post){
            Comentario::factory(3)->create([
                'post_id' => $post->id
            ]);
        });
    }
}

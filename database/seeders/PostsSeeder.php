<?php

namespace Database\Seeders;

use App\Models\Posts;
use App\Models\Usuario;
use Illuminate\Database\Seeder;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuarios = Usuario::all();

        $usuarios->each(function($usuario){
            Posts::factory()->count(3)->create([
                'usuario_id' => $usuario->id
            ]);
        });
    }
}

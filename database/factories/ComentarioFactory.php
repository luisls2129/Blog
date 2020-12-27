<?php

namespace Database\Factories;

use App\Models\Comentario;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

class ComentarioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comentario::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'contenido' => $this->faker->sentence,
            'usuario_id'=> Usuario::inRandomOrder()->first()->id
        ];
    }
}

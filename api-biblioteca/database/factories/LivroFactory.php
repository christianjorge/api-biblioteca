<?php

namespace Database\Factories;

use App\Models\Livro;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Editora>
 */
class LivroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Livro::class;

    public function definition()
    {
        return [
            'titulo' => $this->faker->streetName,
            'ano' => $this->faker->year,
            'id_editora' => $this->faker->numberBetween(1,5),
            'id_autor' => $this->faker->numberBetween(1,5),
            'id_genero' => $this->faker->numberBetween(1,5),
        ];
    }
}

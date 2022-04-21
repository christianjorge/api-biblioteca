<?php

namespace Database\Factories;

use App\Models\Autor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Editora>
 */
class AutorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Autor::class;

    public function definition()
    {
        return [
            'nome' => $this->faker->name,
            'ano_nasc' => $this->faker->year,
            'sexo' => $this->faker->randomElement(['M','F']),
            'nacionalidade' => $this->faker->country
        ];
    }
}

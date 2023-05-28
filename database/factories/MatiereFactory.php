<?php

namespace Database\Factories;

use App\Models\Filiere;
use App\Models\Niveau;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Matiere>
 */
class MatiereFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'code' => fake()->name(),
            'titre' => fake()->title(),
            'credit' => random_int(1,6),
            'niveau_id' => Niveau::inRandomOrder()->first()->id ,
            'filiere_id' => Filiere::inRandomOrder()->first()->id 
        ];
    }
}

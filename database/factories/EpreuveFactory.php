<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Matiere;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Epreuve>
 */
class EpreuveFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'session' => fake()->randomElement(['cc', 'normale']),
            'titre' => fake()->title(), 
            'fichier' => fake()->title(), 
            'semestre' => fake()->randomElement(['1', '2']), 
            'annee' => fake()->year(2023),
            'matiere_id' =>  Matiere::inRandomOrder()->first()->id, 
            //cette methode permet de recuper un seul Id sur les user
            'user_id' => User::inRandomOrder()->first()->id 
        ];
    }
}

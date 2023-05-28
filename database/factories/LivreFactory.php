<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Matiere;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Livre>
 */
class LivreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'auteur' => fake()->name(), 
            'titre' => fake()->title(), 
            'fichier' => fake()->title(), 
            'description' => fake()->text(),
            'matiere_id' =>  Matiere::inRandomOrder()->first()->id, 
            //cette methode permet de recuper un seul Id sur les user
            'user_id' => User::inRandomOrder()->first()->id 
        ];
    }
}

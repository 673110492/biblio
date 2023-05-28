<?php

namespace Database\Factories;

use App\Models\Matiere;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Http;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cours>
 */
class CoursFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'titre' => fake()->title(), 
            'fichier' => fake()->title(), 
            'description' => fake()->title(), 
            'semestre' => fake()->randomElement(['1', '2']), 
            'matiere_id' =>  Matiere::inRandomOrder()->first()->id, 
            //cette methode permet de recuper un seul Id sur les user
            'user_id' => User::inRandomOrder()->first()->id 
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Matiere;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CoursFactory extends Factory
{
    public function definition()
    {
        return [
            'titre' => $this->faker->sentence(3), // phrase de 3 mots
            'fichier' => $this->faker->lexify('cours_?????.pdf'), // ex: cours_abcd1.pdf
            'image' => $this->faker->optional()->imageUrl(640, 480, 'education'), // URL image aléatoire ou null
            'proprietaire' => $this->faker->optional()->name(), // nom aléatoire ou null
            'description' => $this->faker->optional()->paragraph(), // description optionnelle
            'semestre' => $this->faker->randomElement(['1', '2']),
            'matiere_id' => Matiere::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id,
        ];
    }
}


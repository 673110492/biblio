<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Nette\Utils\Random;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Niveau>
 */
class NiveauFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nom' => fake()->title(), 
            //le array_rand utiliser ici permet de selection une valeur dans le tableau
            'cycle' => fake()->randomElement(['BTS', 'LICENCE', 'LICENCE_PRO', 'MASTER', 'MASTER_PRO', 'DOCTORAT'])  
            
        ];
    }
}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Niveau;
use App\Models\Filiere;
use App\Models\Matiere;
use App\Models\Cours;
use App\Models\Livre;
use App\Models\Epreuve;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory(10)->create();
         \App\Models\Niveau::factory(50)->create();
         \App\Models\Filiere::factory(50)->create();
        \App\Models\Matiere::factory(50)->create();
        \App\Models\Cours::factory(50)->create();
        \App\Models\Livre::factory(50)->create();
        \App\Models\Epreuve::factory(50)->create();
         \App\Models\User::create([
             'nom' => 'Admin',
            'prenom' => 'Admin',
            'email' => 'admin@gmail.com',
             'password' => bcrypt('admin'),
         ]);
    }
}

<?php

namespace Database\Seeders;

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

         User::create([
             'nom' => 'Admin',
             'prenom' => 'Admin',
             'email' => 'admin@gmail.com',
             'password' => bcrypt('admin'),
         ]);
    }
}

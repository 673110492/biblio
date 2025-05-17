<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cours; // Import du modèle Cours

class WelcomeController extends Controller
{
    public function index()
    {
        $cours = Cours::all(); // Récupère tous les cours en base

        return view('welcome', compact('cours')); // Passe les cours à la vue
    }
}

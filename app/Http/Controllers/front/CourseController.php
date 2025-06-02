<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cours;
use App\Models\Filiere;
use App\Models\Matiere;
use App\Models\Niveau;

class CourseController extends Controller
{
    public function courseliste(Request $request)
    {
        $matieres = Matiere::all();
        $filieres = Filiere::latest()->get();
        $niveaux = Niveau::all();

        $cours = Cours::query();

        // Filtrer uniquement par filière
        if ($request->filled('filiere_id')) {
            $cours->where('filiere_id', $request->filiere_id);
        }

        $cours = $cours->latest()->paginate(10);

        return view('front.cour', compact('cours', 'matieres', 'filieres', 'niveaux'));
    }
}

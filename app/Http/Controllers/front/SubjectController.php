<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Epreuve;
use App\Models\Filiere;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function listeEpreuve(Request $request)
    {
        $query = Epreuve::with(['matiere', 'user', 'filiere']);

        // Filtrer par filière
        if ($request->filled('filiere_id')) {
            $query->where('filiere_id', $request->filiere_id);
        }

        // Filtrer par département
        if ($request->filled('departement')) {
            $query->whereHas('filiere', function ($q) use ($request) {
                $q->where('departement', $request->departement);
            });
        }

        // Filtrer par faculté
        if ($request->filled('faculter')) {
            $query->whereHas('filiere', function ($q) use ($request) {
                $q->where('faculter', $request->faculter);
            });
        }

        $epreuves = $query->latest()->paginate(9);
        $filieres = Filiere::all(); // Pour la liste déroulante

        return view('front.epreuve', compact('epreuves', 'filieres'));
    }
}

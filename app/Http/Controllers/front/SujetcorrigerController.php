<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Faxe;
use App\Models\Matiere;
use App\Models\Niveau;
use App\Models\Filiere;
use Illuminate\Http\Request;

class SujetcorrigerController extends Controller
{
   public function index(Request $request)
{
    $matieres = Matiere::all();
    $niveaux = Niveau::all();
    $filieres = Filiere::all();

    $query = Faxe::query();

    if ($request->filled('matiere_id')) {
        $query->where('matiere_id', $request->matiere_id);
    }

    if ($request->filled('niveau_id')) {
        $query->where('niveau_id', $request->niveau_id);
    }

    if ($request->filled('filiere_id')) {
        $query->where('filiere_id', $request->filiere_id);
    }

    $faxes = $query->paginate(10);

    return view('front.faxe', compact('faxes', 'matieres', 'niveaux', 'filieres'));
}

}

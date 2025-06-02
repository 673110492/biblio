<?php
namespace App\Http\Controllers;

use App\Models\Cours;
use App\Models\Matiere;
use App\Models\Epreuve;
use App\Models\Niveau;
use App\Models\Filiere;
use App\Models\Fax; // ou SujetCorrige si c'est un autre modèle
use App\Models\Faxe;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $counts = [
            'cours' => Cours::count(),
            'matieres' => Matiere::count(),
            'epreuves' => Epreuve::count(),
            'niveaux' => Niveau::count(),
            'filieres' => Filiere::count(),
            'faxes' => Faxe::count(),
        ];

        return view('dashboard', compact('counts'));
    }
}

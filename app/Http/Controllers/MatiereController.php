<?php

namespace App\Http\Controllers;

use App\Models\Matiere;
use App\Models\Niveau;
use App\Models\Filiere;
use Illuminate\Http\Request;

class MatiereController extends Controller
{
    /**
     * Affiche la liste des matières.
     */
    public function index()
    {
        $matieres = Matiere::with(['niveau', 'filiere'])->get();
        $niveaux = Niveau::all();
        $filieres = Filiere::all();

        return view('matieres.index', compact('matieres', 'niveaux', 'filieres'));
    }

    /**
     * Affiche le formulaire de création.
     */
    public function create()
    {
        $niveaux = Niveau::all();
        $filieres = Filiere::all();

        return view('matieres.create', compact('niveaux', 'filieres'));
    }

    /**
     * Enregistre une nouvelle matière.
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|string|max:255',
            'titre' => 'required|string|max:255',
            'credit' => 'required|integer|min:1',
            'niveau_id' => 'required|exists:niveaux,id',
            'filiere_id' => 'required|exists:filieres,id',
        ]);

        Matiere::create($request->all());

        return redirect('matieres')->with('success', 'Matière ajoutée avec succès.');
    }

    /**
     * Affiche une matière spécifique.
     */
    public function show($id)
    {
        $matiere = Matiere::with(['niveau', 'filiere'])->findOrFail($id);

        return view('matieres.show', compact('matiere'));
    }

    /**
     * Affiche le formulaire d’édition d’une matière.
     */
    public function edit($id)
    {
        $matiere = Matiere::findOrFail($id);
        $niveaux = Niveau::all();
        $filieres = Filiere::all();

        return view('matieres.edit', compact('matiere', 'niveaux', 'filieres'));
    }

    /**
     * Met à jour une matière existante.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'code' => 'required|string|max:255',
            'titre' => 'required|string|max:255',
            'credit' => 'required|integer|min:1',
            'niveau_id' => 'required|exists:niveaux,id',
            'filiere_id' => 'required|exists:filieres,id',
        ]);

        $matiere = Matiere::findOrFail($id);
        $matiere->update($request->all());

        return redirect('matieres')->with('success', 'Matière mise à jour avec succès.');
    }

    /**
     * Supprime une matière.
     */
   public function destroy($id)
{
    $matiere = Matiere::findOrFail($id);
    $matiere->delete();

    return redirect('matieres')->with('success', 'Matière supprimée avec succès.');
}

}

<?php

namespace App\Http\Controllers;

use App\Models\Faxe;
use App\Models\Matiere;
use App\Models\Niveau;
use App\Models\Filiere;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FaxeController extends Controller
{
    // Affiche la liste des faxes
    public function index()
    {
        $matieres = Matiere::all();
        $niveaux = Niveau::all();
        $filieres = Filiere::all();
        $faxes = Faxe::with(['matiere', 'niveau', 'filiere'])->get();  // Chargement eager pour éviter N+1
        return view('faxe.index', compact('faxes', 'matieres', 'niveaux', 'filieres'));
    }

    // Formulaire de création (si besoin d'une page dédiée)
    public function create()
    {
        $matieres = Matiere::all();
        $niveaux = Niveau::all();
        $filieres = Filiere::all();
        return view('faxe.create', compact('matieres', 'niveaux', 'filieres'));
    }

    // Stocke un nouveau fax
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'fichier' => 'required|file|mimes:pdf,docx,doc,pptx,zip',
            'matiere_id' => 'required|exists:matieres,id',
            'niveau_id' => 'required|exists:niveaux,id',
            'filiere_id' => 'required|exists:filieres,id',
        ]);

        $path = $request->file('fichier')->store('faxes', 'public');

        Faxe::create([
            'nom' => $validated['nom'],
            'fichier' => $path,
            'matiere_id' => $validated['matiere_id'],
            'niveau_id' => $validated['niveau_id'],
            'filiere_id' => $validated['filiere_id'],
        ]);

        return redirect()->route('faxes.index')->with('success', 'Fax ajouté avec succès.');
    }

    // Formulaire d'édition (si page dédiée)
    public function edit(Faxe $faxe)
    {
        $matieres = Matiere::all();
        $niveaux = Niveau::all();
        $filieres = Filiere::all();
        return view('faxe.edit', compact('faxe', 'matieres', 'niveaux', 'filieres'));
    }

    // Met à jour un fax
    public function update(Request $request, Faxe $faxe)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'fichier' => 'nullable|file|mimes:pdf,docx,doc,pptx,zip',
            'matiere_id' => 'required|exists:matieres,id',
            'niveau_id' => 'required|exists:niveaux,id',
            'filiere_id' => 'required|exists:filieres,id',
        ]);

        if ($request->hasFile('fichier')) {
            // Supprimer l'ancien fichier s'il existe
            if ($faxe->fichier && Storage::disk('public')->exists($faxe->fichier)) {
                Storage::disk('public')->delete($faxe->fichier);
            }
            $path = $request->file('fichier')->store('faxes', 'public');
            $faxe->fichier = $path;
        }

        $faxe->nom = $validated['nom'];
        $faxe->matiere_id = $validated['matiere_id'];
        $faxe->niveau_id = $validated['niveau_id'];
        $faxe->filiere_id = $validated['filiere_id'];

        $faxe->save();

        return redirect()->route('faxes.index')->with('success', 'Fax mis à jour avec succès.');
    }

    // Supprime un fax
    public function destroy(Faxe $faxe)
    {
        if ($faxe->fichier && Storage::disk('public')->exists($faxe->fichier)) {
            Storage::disk('public')->delete($faxe->fichier);
        }

        $faxe->delete();

        return redirect()->route('faxes.index')->with('success', 'Fax supprimé avec succès.');
    }
}

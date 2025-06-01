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
    // Liste des faxes
    public function index()
    {
        $matieres = Matiere::all();
        $niveaux = Niveau::all();
        $filieres = Filiere::all();
        $faxes = Faxe::with(['matiere', 'niveau', 'filiere'])->get();
        return view('faxe.index', compact('faxes', 'matieres', 'niveaux', 'filieres'));
    }

    // Formulaire création
    public function create()
    {
        $matieres = Matiere::all();
        $niveaux = Niveau::all();
        $filieres = Filiere::all();
        return view('faxe.create', compact('matieres', 'niveaux', 'filieres'));
    }

    // Stockage fax
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

        return redirect()->route('admin.faxes.index')->with('success', 'Fax ajouté avec succès.');
    }

    // Afficher un fax (optionnel)
    public function show(Faxe $fax)
    {
        return view('faxe.show', compact('fax'));
    }

    // Formulaire édition
    public function edit(Faxe $fax)
    {
        $matieres = Matiere::all();
        $niveaux = Niveau::all();
        $filieres = Filiere::all();
        return view('faxe.edit', compact('fax', 'matieres', 'niveaux', 'filieres'));
    }

    // Mise à jour fax
    public function update(Request $request, Faxe $fax)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'fichier' => 'nullable|file|mimes:pdf,docx,doc,pptx,zip',
            'matiere_id' => 'required|exists:matieres,id',
            'niveau_id' => 'required|exists:niveaux,id',
            'filiere_id' => 'required|exists:filieres,id',
        ]);

        if ($request->hasFile('fichier')) {
            if ($fax->fichier && Storage::disk('public')->exists($fax->fichier)) {
                Storage::disk('public')->delete($fax->fichier);
            }
            $path = $request->file('fichier')->store('faxes', 'public');
            $fax->fichier = $path;
        }

        $fax->nom = $validated['nom'];
        $fax->matiere_id = $validated['matiere_id'];
        $fax->niveau_id = $validated['niveau_id'];
        $fax->filiere_id = $validated['filiere_id'];
        $fax->save();

        return redirect()->route('admin.faxes.index')->with('success', 'Fax mis à jour avec succès.');
    }

    // Suppression fax
    public function destroy(Faxe $fax)
    {
        if ($fax->fichier && Storage::disk('public')->exists($fax->fichier)) {
            Storage::disk('public')->delete($fax->fichier);
        }

        $fax->delete();

        return redirect()->route('admin.faxes.index')->with('success', 'Fax supprimé avec succès.');
    }
}

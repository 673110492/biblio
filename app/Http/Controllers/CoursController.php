<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cours;
use App\Models\Matiere;
use App\Models\User;
use App\Models\Filiere;
use Illuminate\Support\Facades\Storage;

class CoursController extends Controller
{
    public function index()
    {
        $cours = Cours::latest()->paginate(10);
        $users = User::all();
        $matieres = Matiere::all();
        $filieres = Filiere::all();

        return view('cours.index', compact('cours', 'users', 'matieres', 'filieres'));
    }

    public function create()
    {
        $users = User::all();
        $matieres = Matiere::all();
        $filieres = Filiere::all();

        return view('cours.create', compact('users', 'matieres', 'filieres'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'fichier' => 'required|file|mimes:pdf,doc,docx,pptx',
            'semestre' => 'required|in:1,2',
            'description' => 'nullable|string',
            'matiere_id' => 'required|exists:matieres,id',
            'user_id' => 'required|exists:users,id',
            'filiere_id' => 'required|exists:filieres,id',
            'image' => 'nullable|image',
            'proprietaire' => 'nullable|string|max:255',
        ]);

        $cours = new Cours();
        $cours->titre = $request->titre;
        $cours->description = $request->description;
        $cours->semestre = $request->semestre;
        $cours->matiere_id = $request->matiere_id;
        $cours->user_id = $request->user_id;
        $cours->filiere_id = $request->filiere_id;
        $cours->proprietaire = $request->proprietaire;

        // Upload fichier
        if ($request->hasFile('fichier')) {
            $file = $request->file('fichier');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('cours', $filename, 'public');
            $cours->fichier = 'cours/' . $filename;
        }

        // Upload image
        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            $imageName = time() . '_img_' . $imageFile->getClientOriginalName();
            $imageFile->storeAs('cours/images', $imageName, 'public');
            $cours->image = 'cours/images/' . $imageName;
        }

        $cours->save();

        return redirect()->route('cours.index')->with('success', 'Cours ajouté avec succès');
    }

    public function show($id)
    {
        $cours = Cours::findOrFail($id);
        $users = User::all();
        $matieres = Matiere::all();
        $filieres = Filiere::all();

        return view('cours.show', compact('cours', 'users', 'matieres', 'filieres'));
    }

    public function edit(Cours $cours)
    {
        $users = User::all();
        $matieres = Matiere::all();
        $filieres = Filiere::all();

        return view('cours.edit', compact('cours', 'users', 'matieres', 'filieres'));
    }

    public function update(Request $request, Cours $cours)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'fichier' => 'nullable|file|mimes:pdf,doc,docx,pptx',
            'image' => 'nullable|image',
            'proprietaire' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'semestre' => 'required|in:1,2',
            'matiere_id' => 'required|exists:matieres,id',
            'user_id' => 'required|exists:users,id',
            'filiere_id' => 'required|exists:filieres,id',
        ]);

        $data = $request->only([
            'titre',
            'description',
            'semestre',
            'matiere_id',
            'user_id',
            'filiere_id',
            'proprietaire',
        ]);

        // Gérer le fichier
        if ($request->hasFile('fichier')) {
            if ($cours->fichier) {
                Storage::disk('public')->delete($cours->fichier);
            }
            $file = $request->file('fichier');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('cours', $filename, 'public');
            $data['fichier'] = 'cours/' . $filename;
        }

        // Gérer l'image
        if ($request->hasFile('image')) {
            if ($cours->image) {
                Storage::disk('public')->delete($cours->image);
            }
            $imageFile = $request->file('image');
            $imageName = time() . '_img_' . $imageFile->getClientOriginalName();
            $imageFile->storeAs('cours/images', $imageName, 'public');
            $data['image'] = 'cours/images/' . $imageName;
        }

        $cours->update($data);

        return redirect()->route('cours.index')->with('success', 'Cours mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $cours = Cours::findOrFail($id);

        if ($cours->fichier) {
            Storage::disk('public')->delete($cours->fichier);
        }
        if ($cours->image) {
            Storage::disk('public')->delete($cours->image);
        }

        $cours->delete();

        return redirect()->route('cours.index')->with('success', 'Cours supprimé avec succès.');
    }
}

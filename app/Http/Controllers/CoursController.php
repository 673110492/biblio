<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cours;
use App\Models\Matiere;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class CoursController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cours = Cours::latest()->paginate(10);
        $users = User::all();
        $matieres = Matiere::all();
        return view('cours.index', compact('cours', 'users', 'matieres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $matieres = Matiere::all();

        return view('cours.create', compact('users', 'matieres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'fichier' => 'required|file|mimes:pdf,doc,docx,pptx', // adapte selon types acceptés
            'semestre' => 'required|in:1,2',
            'description' => 'nullable|string',
            'matiere_id' => 'required|exists:matieres,id',
            'user_id' => 'required|exists:users,id',
        ]);

        // Gestion du fichier uploadé
        if ($request->hasFile('fichier')) {
            $file = $request->file('fichier');
            $filename = time() . '_' . $file->getClientOriginalName();
            // Déplacer le fichier dans storage/app/public/cours
            $file->storeAs('public/cours', $filename);
        } else {
            $filename = null; // ou gérer autrement
        }

        $cours = new Cours();
        $cours->titre = $request->titre;
        $cours->fichier = $filename; // enregistre le nom du fichier
        $cours->description = $request->description;
        $cours->semestre = $request->semestre;
        $cours->matiere_id = $request->matiere_id;
        $cours->user_id = $request->user_id;
        $cours->save();

        return redirect()->route('cours.index')->with('success', 'Cours ajouté avec succès');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $cours = Cours::findOrFail($id);
        $users = User::all();
        $matieres = Matiere::all();
        return view('cours.show', compact('cours', 'users', 'matieres'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cours $cours)
    {
        $users = User::all();
        $matieres = Matiere::all();

        return view('cours.edit', compact('cours', 'users', 'matieres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cours $cours)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'fichier' => 'nullable|file',
            'image' => 'nullable|image',
            'proprietaire' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'semestre' => 'required|in:1,2',
            'matiere_id' => 'required|exists:matieres,id',
            'user_id' => 'required|exists:users,id',
        ]);

        $data = $request->all();

        // Gérer la mise à jour du fichier
        if ($request->hasFile('fichier')) {
            // Supprimer l'ancien fichier s'il existe
            if ($cours->fichier) {
                Storage::disk('public')->delete($cours->fichier);
            }
            $url = $request->file('fichier')->store('uploads/cours/fichiers', 'public');
            $data['fichier'] = $url;
        } else {
            unset($data['fichier']); // On ne met pas à jour le champ fichier si aucun upload
        }

        // Gérer la mise à jour de l'image
        if ($request->hasFile('image')) {
            if ($cours->image) {
                Storage::disk('public')->delete($cours->image);
            }
            $urlImage = $request->file('image')->store('uploads/cours/images', 'public');
            $data['image'] = $urlImage;
        } else {
            unset($data['image']);
        }

        $cours->update($data);

        return redirect()->route('cours.index')->with('success', 'Cours mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cours = Cours::findOrFail($id);

        // Supprimer les fichiers associés
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Epreuve;
use App\Models\Matiere;
use App\Models\User;
use App\Models\Filiere;

class EpreuveController extends Controller
{
    public function index()
    {
        $epreuves = Epreuve::with(['matiere', 'user', 'filiere'])->latest()->paginate(10);
        return view('epreuve.index', compact('epreuves'));
    }

    public function create()
    {
        $users = User::all();
        $matieres = Matiere::all();
        $filieres = Filiere::all();

        return view('epreuve.create', compact('users', 'matieres', 'filieres'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'session' => 'required',
            'titre' => 'required',
            'fichier' => 'required', // tu peux adapter les extensions autorisées
            'semestre' => 'required',
            'matiere_id' => 'required|exists:matieres,id',
            'user_id' => 'required|exists:users,id',
            'filiere_id' => 'required|exists:filieres,id',
        ]);

        $data = $request->all();

        if ($request->hasFile('fichier')) {
            $url = $request->file('fichier')->store('epreuve', 'public');
            $data['fichier'] = url('storage/' . $url);
        }

        Epreuve::create($data);

        return redirect('epreuves')->with('success', 'Épreuve créée avec succès.');
    }

    public function show(Epreuve $epreuve)
    {
        return view('epreuve.show', compact('epreuve'));
    }

    public function edit($id)
    {
        $epreuve = Epreuve::findOrFail($id);
        $users = User::all();
        $matieres = Matiere::all();
        $filieres = Filiere::all();

        return view('epreuve.edit', compact('epreuve', 'users', 'matieres', 'filieres'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'session' => 'required',
            'titre' => 'required',
            'semestre' => 'required',
            'matiere_id' => 'required|exists:matieres,id',
            'user_id' => 'required|exists:users,id',
            'filiere_id' => 'required|exists:filieres,id',
            'fichier' => 'nullable', // nullable pour update
        ]);

        $epreuve = Epreuve::findOrFail($id);

        $data = $request->all();

        if ($request->hasFile('fichier')) {
            $url = $request->file('fichier')->store('epreuve', 'public');
            $data['fichier'] = url('storage/' . $url);
        } else {
            unset($data['fichier']);
        }

        $epreuve->update($data);

        return redirect('epreuves')->with('success', 'Épreuve mise à jour avec succès.');
    }

    public function destroy(Epreuve $epreuve)
    {
        $epreuve->delete();

        return redirect('epreuves')->with('success', 'Épreuve supprimée avec succès.');
    }
}

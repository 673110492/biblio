<?php

namespace App\Http\Controllers;

use App\Models\Livre;
use App\Models\Matiere;
use App\Models\User;
use Illuminate\Http\Request;

class LivreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $livres = Livre::all();
        return view('livre.index', compact('livres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $matieres = Matiere::all();
        return view('livre.create',  compact('users', 'matieres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'auteur' => 'required',
            'titre' => 'required',
            'fichier' => 'required',
        ]);
        $data = $request->all();
        if (!empty($request->file('fichier'))) {
            $url = $request->fichier('fichier')->store('uploads/cours/fichier' , 'public');
            $fichier = url('storage/' . $url);
            $data['fichier'] =$fichier;
        }           
    
        Livre::create($data);
        return redirect('livres');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $livres = Livre::find($id);
        return view('livres.show', compact('livre'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Livre $livre)
    {
        $users = User::all();
        $matieres = Matiere::all(); 
        return view('livre.edit' , compact('livre', 'users', 'matieres')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Livre $livres)
    {
        $this->validate($request, [
            'auteur' => 'required',
            'titre' => 'required',
            'fichier' => 'required',
          ]);
          $data = $request->all();
     
  
          $livres->update($data);
  
          return redirect('livres');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Livre::destroy($id);
        return redirect('livres');
    }
}

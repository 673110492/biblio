<?php

namespace App\Http\Controllers;

use App\Models\Filiere;
use App\Models\Matiere;
use App\Models\Niveau;
use Illuminate\Http\Request;

class MatiereController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matieres = Matiere::all();
        return view('matieres.index', compact('matieres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $niveaux = Niveau::all();
        $filieres = Filiere::all();
        
        return view('matieres.create', compact('niveaux', 'filieres'));

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
            'code' => 'required',
            'titre' => 'required',
            'credit' => 'required',
            
        ]);
        $data = $request->all();
    
        Matiere::create($data);
        return redirect('matieres');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $matieres = Matiere::find($id);
        return view('matieres.show', compact('matieres'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $niveaux = Niveau::all();
        $filieres = Filiere::all(); 
        $matiere = Matiere::find($id);
        return view('matieres.edit' , compact('matiere', 'niveaux', 'filieres')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $this->validate($request, [
            'code' => 'required',
            'titre' => 'required',
            'credit' => 'required',
        ]);
        $data = $request->all();
        $matieres = Matiere::find($id);
        $matieres->update($data);

        return redirect('matieres');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Matiere::destroy($id);
        return redirect('matieres');
    }
}

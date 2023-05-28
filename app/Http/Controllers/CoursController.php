<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cours;
use App\Models\Matiere;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Termwind\Components\Dd;

class CoursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cours = Cours::latest()->paginate(10);
        return view('cours.index', compact('cours'));
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
        
        return view('cours.create', compact('users', 'matieres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
        // dd($request);
        $this->validate($request, [
            'titre' => 'required',
            'fichier' => 'required',
            'semestre' => 'required'
            
        ]);
        $data = $request->all();
        if (!empty($request->file('fichier'))) {
            $url = $request->file('fichier')->store('uploads/cours/fichier' , 'public');
            $fichier = url('storage/' . $url);
            $data['fichier'] = $fichier;
        }           
    
        Cours::create($data);

        return redirect('cours');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cours $cours)
    {
        return view('cours.show', compact('cours'));
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Cours $cour)
    {
        $users = User::all();
        $matieres = Matiere::all(); 
        return view('cours.edit' , compact('cour', 'users', 'matieres')); 
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
            'titre' => 'required',
            'fichier' => 'required',
            'description' => 'required',
            'semestre' => 'required'
        ]);
        $data = $request->all();
        $cours = Cours::find($id);
        $cours->update($data);

        return redirect('cours');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cours::destroy($id);
        return redirect('cours');

    }
}

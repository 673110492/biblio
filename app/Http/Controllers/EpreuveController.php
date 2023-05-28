<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Epreuve;
use App\Models\Matiere;
use App\Models\User;

class EpreuveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $epreuves = Epreuve::latest()->paginate(10);
        return view('epreuve.index', compact('epreuves'));
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
        
        return view('epreuve.create', compact('users', 'matieres'));

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
            'session' => 'required',
            'titre' => 'required',
            'fichier' => 'required',
            'semestre' => 'required',
            
        ]);
        $data = $request->all();
        if (!empty($request->file('fichier'))) {
            $url = $request->fichier('fichier')->store('uploads/cours/fichier' , 'public');
            $fichier = url('storage/' . $url);
            $data['fichier'] =$fichier;
        }          


        Epreuve::create($data);

        return redirect('epreuves');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Epreuve $epreuves)
    {
        return view('epreuve.show', compact('epreuves'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $epreuve = Epreuve::find($id);
        $users = User::all();
        $matieres = Matiere::all(); 
        return view('epreuve.edit' , compact('epreuve', 'users', 'matieres')); 

       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'session' => 'required',
            'titre' => 'required',
            'fichier' => 'required',
            'semestre' => 'required',
          ]);
          $data = $request->all();

          $epreuve = Epreuve::find($id);

        //  dd($data);
          $epreuve->update($data);

          return redirect('epreuves');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Epreuve $epreuves)
    {
        $epreuves->delete();
        return redirect('epreuves');
    }
}

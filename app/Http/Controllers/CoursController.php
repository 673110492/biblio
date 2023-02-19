<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cours;

class CoursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cours = Cours::all();
        return view('cours.index', compact('cours'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cours.create');
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
            'fichier' => 'required'
        ]);
        $data = $request->all();
    
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
    public function edit(Cours $cours)
    {
        return view('cours.edit' , compact('cours')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cours $cours)
    {
        $this->validate($request, [
           'auteur' => 'required',
            'titre' => 'required',
            'fichier' => 'required',
        ]);
        $data = $request->all();
   
        $cours->update($data);

        return redirect('cours');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cours $cours)
    {
        $cours->delete();
        return redirect('cours');
    }
}

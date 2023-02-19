<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Epreuve;


class EpreuveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $epreuves = Epreuve::all();
        return view('epreuve.index', compact('epreuves'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('epreuve.create');
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
    public function edit(Epreuve $epreuves)
    {
        return view('epreuve.edit' , compact('epreuves'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Epreuve $epreuves)
    {
        $this->validate($request, [
            'session' => 'required',
            'titre' => 'required',
            'fichier' => 'required',
            'semestre' => 'required',
          ]);
          $data = $request->all();

          $epreuves->update($data);

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

@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col">
        <div class="page-title-container">
            <div class="row">
                <div class="col-12 col-md-7">
                    <h1 class="mb-0 pb-0 display-4" id="title">FORMULAIRE D'AJOUT DES MATIERES </h1>
                </div>
            </div>


            <div class="card mb-5">
                <div class="card-body">
                    <form method="POST" action="{{ url('matieres') }}" id="validationTopLabel" class="tooltip-end-top" enctype="multipart/form-data" novalidate="novalidate">
                        @csrf
                        <label class="mb-3 top-label">
                            <input class="form-control" type="code" name="code" required="">
                            <span>code</span>
                        </label>

                        <label class="mb-3 top-label">
                            <input class="form-control" type="text" name="titre" required="">
                            <span>titre</span>
                        </label>

                        <label class="mb-3 top-label">
                            <input class="form-control" type="texte" name="credit" required="">
                            <span>credit</span>
                        </label>


                          <select class="form-select" id="specificSizeSelect"  name="niveau_id">
                            <option selected="selected">Selectionner le niveaux</option>
                            @foreach($niveaux as $niveau)
                            <option value="{{ $niveau->id }}">{{ $niveau->cycle}}</option>
                            @endforeach
                        </select> <br>

                         <select class="form-select" id="specificSizeSelect" name="filiere_id">
                            <option selected="selected">Selectionner la filiere</option>
                            @foreach($filieres as $filiere)
                            <option value="{{ $filiere->id }}">{{ $filiere->nom }} </option>
                            @endforeach
                        </select> <br>

                        <button class="btn btn-primary" type="submit">
                            ajouter
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

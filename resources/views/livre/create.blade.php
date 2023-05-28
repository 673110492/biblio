@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col">
        <div class="page-title-container">
            <div class="row">
                <div class="col-12 col-md-7">
                    <h1 class="mb-0 pb-0 display-4" id="title">FORMULAIRE D'AJOUT DES LIVRE </h1>
                </div>
            </div>
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="card mb-5">
                <div class="card-body">
                    <form method="POST" action="{{ url('livres') }}" id="validationTopLabel" class="tooltip-end-top" novalidate="novalidate">
                        @csrf

                        <label class="mb-3 top-label">
                            <input class="form-control" type="text" name="auteur" required="">
                            <span>Auteur</span>
                        </label>

                         <label class="mb-3 top-label">
                            <input class="form-control" type="text" name="titre" required="">
                            <span>Titre</span>
                        </label>

                        <label class="mb-3 top-label">
                            <input class="form-control" type="file" name="fichier" required="">
                            <span>Selectionner un fichier</span>
                        </label>

                        </label>
                        <label class="mb-3 top-label">
                            <input class="form-control" type="texte" name="description">
                            <span>Description</span>
                        </label>
                        
                         <select class="form-select" id="specificSizeSelect"  name="matiere_id">
                            <option selected="selected">Selectionner la matières</option>
                            @foreach($matieres as $matiere)
                            <option value="{{ $matiere->id }}">{{ $matiere->titre}}</option>
                            @endforeach
                        </select> <br>

                         <select class="form-select" id="specificSizeSelect" name="user_id">
                            <option selected="selected">Selectionner le professeur</option>
                            @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->nom }} </option>
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

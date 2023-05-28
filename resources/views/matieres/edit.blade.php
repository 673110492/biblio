@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col">
        <div class="page-title-container">
            <div class="row">
                <div class="col-12 col-md-7">
                    <h1 class="mb-0 pb-0 display-4" id="title">FORMULAIRE D'AJOUT DE MODIFICATION </h1>
                </div>
            </div>


            <div class="card mb-5">
                <div class="card-body">
                    <form method="POST" action="{{ url('matieres' . $matiere->id) }}" id="validationTopLabel" class="tooltip-end-top" enctype="multipart/form-data" novalidate="novalidate">
                        @csrf
                        {{method_field('PATCH')}}
                        <label class="mb-3 top-label">
                            <input class="form-control" type="code" value="{{ $matiere->code }}" name="code" required="">
                            <span>code</span>
                        </label>

                        <label class="mb-3 top-label">
                            <input class="form-control" type="text" value="{{ $matiere->titre }}" name="titre" required="">
                            <span>titre</span>
                        </label>

                        <label class="mb-3 top-label">
                            <input class="form-control" type="texte" value="{{ $matiere->credit }}" name="credit" required="">
                            <span>credit</span>
                        </label>


                        <select class="form-select" id="specificSizeSelect" name="niveau_id">
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
                            modifier
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

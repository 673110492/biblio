@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col">
        <div class="page-title-container">
            <div class="row">
                <div class="col-12 col-md-7">
                    <h1 class="mb-0 pb-0 display-4" id="title">FORMULAIRE DE MODIFICATION DES COURS </h1>
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
                    <form method="POST" action="{{url('cours/' . $cour->id) }}" id="validationTopLabel" class="tooltip-end-top" novalidate="novalidate">
                        @csrf
                        {{method_field('PATCH')}}

                        <label class="mb-3 top-label">
                            <input class="form-control" type="text" value="{{$cour->titre}}" name="titre" required="">
                            <span>Titre</span>
                        </label>

                        <label class="mb-3 top-label">
                            <input class="form-control" type="file" value="{{$cour->fichier}}" name="fichier" required="" id="fichier">
                            <span>Selectionner un fichier</span>
                        </label>

                        <select class="form-select" id="specificSizeSelect" name="semestre">
                            <option disabled>Selectionner le semestres</option>
                            <option value="1" {{isset($cour) && $cour->semestre==1 ? 'selected="selected"' : ''}}>1</option>
                            <option value="2" {{isset($cour) && $cour->semestre==2 ? 'selected="selected"' : ''}}>2</option>
                        </select> <br>

                        <div class="form-floating mb-3">
                            <textarea class="form-control error" placeholder="Description" rows="3" value="{{$cour->description}}" name="description" required="" _mstplaceholder="94653" _msthash="223" aria-invalid="true" aria-describedby="addressFloatingLabel-error">{{ isset($cour) ? $cour->description : '' }}</textarea>
                            <label _msttexthash="94237" _msthash="224">Description</label>
                        </div>

                        <select class="form-select" id="specificSizeSelect" name="matiere_id">
                            <option disabled>Selectionner la matières</option>
                            @foreach($matieres as $matiere)
                            <option value="{{ $matiere->id }}" {{isset($cour) && $cour->matiere->id==$matiere->id ? 'selected="selected"' : ''}}>{{ $matiere->titre}}</option>
                            @endforeach
                        </select> <br>

                        <select class="form-select" id="specificSizeSelect" name="user_id">
                            <option disabled>Selectionner le professeur</option>
                            @foreach($users as $user)
                            <option value="{{ $user->id }}" {{isset($cour) && $cour->user->id==$user->id ? 'selected="selected"' : ''}}>{{ $user->nom }} </option>
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

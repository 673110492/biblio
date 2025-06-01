@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col">
        <div class="page-title-container">
            <div class="row">
                <div class="col-12 col-md-7">
                    <h1 class="pb-0 mb-0 display-4" id="title">Formulaire d'ajout du niveau scolaire</h1>
                </div>
            </div>

            {{-- Affichage des erreurs --}}
            @if($errors->any())
            <div class="mt-3 alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="mt-4 mb-5 card">
                <div class="card-body">
                    <form method="POST" action="{{ url('niveaux') }}" id="validationTopLabel" class="row g-3">
                        @csrf

                        {{-- Champ nom --}}
                        <div class="form-floating col-md-12">
                            <input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom" name="nom" placeholder="Nom du niveau" value="{{ old('nom') }}" required>
                            <label for="nom">Nom du niveau</label>
                            @error('nom')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        {{-- Champ cycle --}}
                        <div class="form-floating col-md-12">
                            <select class="form-select @error('cycle') is-invalid @enderror" id="cycle" name="cycle" required>
                                <option value="" disabled selected>Choisir un cycle</option>
                                <option value="LICENCE1" {{ old('cycle') == 'LICENCE1' ? 'selected' : '' }}>LICENCE1</option>
                                <option value="LICENCE2" {{ old('cycle') == 'LICENCE2' ? 'selected' : '' }}>LICENCE2</option>
                                <option value="LICENCE_3" {{ old('cycle') == 'LICENCE_3' ? 'selected' : '' }}>LICENCE_3</option>
                                <option value="MASTER" {{ old('cycle') == 'MASTER' ? 'selected' : '' }}>MASTER</option>
                                <option value="MASTER_PRO" {{ old('cycle') == 'MASTER_PRO' ? 'selected' : '' }}>MASTER_PRO</option>
                                <option value="DOCTORAT" {{ old('cycle') == 'DOCTORAT' ? 'selected' : '' }}>DOCTORAT</option>
                            </select>
                            <label for="cycle">Cycle</label>
                            @error('cycle')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">
                                Ajouter
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

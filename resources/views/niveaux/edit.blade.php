@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col">
        <div class="page-title-container">
            <div class="row">
                <div class="col-12 col-md-7">
                    <h1 class="pb-0 mb-0 display-4" id="title">FORMULAIRE DE MODIFICATION DU NIVEAU</h1>
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

            <div class="mb-5 card">
                <div class="card-body">
                    <form method="POST" action="{{ url('niveaux/' . $niveaux->id) }}" id="validationTopLabel" class="tooltip-end-top" novalidate="novalidate">
                        @csrf
                        @method('PATCH')

                        <label class="mb-3 top-label">
                            <input
                                class="form-control"
                                type="text"
                                name="nom"
                                required
                                value="{{ old('nom', $niveaux->nom) }}"
                            >
                            <span>Nom</span>
                        </label>

                        <select class="form-select" id="specificSizeSelect" name="cycle" required>
                            <option value="" disabled {{ old('cycle', $niveaux->cycle) ? '' : 'selected' }}>Sélectionner le cycle</option>
                            <option value="LICENCE1" {{ old('cycle', $niveaux->cycle) == 'LICENCE1' ? 'selected' : '' }}>LICENCE1</option>
                            <option value="LICENCE2" {{ old('cycle', $niveaux->cycle) == 'LICENCE2' ? 'selected' : '' }}>LICENCE2</option>
                            <option value="LICENCE_3" {{ old('cycle', $niveaux->cycle) == 'LICENCE_3' ? 'selected' : '' }}>LICENCE_3</option>
                            <option value="MASTER" {{ old('cycle', $niveaux->cycle) == 'MASTER' ? 'selected' : '' }}>MASTER</option>
                            <option value="MASTER_PRO" {{ old('cycle', $niveaux->cycle) == 'MASTER_PRO' ? 'selected' : '' }}>MASTER_PRO</option>
                            <option value="DOCTORAT" {{ old('cycle', $niveaux->cycle) == 'DOCTORAT' ? 'selected' : '' }}>DOCTORAT</option>
                        </select>
                        <br>

                        <button class="btn btn-primary" type="submit">
                            Modifier
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

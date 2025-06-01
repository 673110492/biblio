@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="mb-4 text-primary fw-bold">Modifier Fax</h1>

    {{-- Bouton retour --}}
    <a href="{{ route('admin.faxes.index') }}" class="mb-4 btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Retour à la liste
    </a>

    {{-- Affichage des erreurs --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.faxes.update', $fax->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Nom --}}
        <div class="mb-3">
            <label for="nom" class="form-label fw-semibold">Nom <span class="text-danger">*</span></label>
            <input type="text" name="nom" id="nom" class="form-control @error('nom') is-invalid @enderror"
                   value="{{ old('nom', $fax->nom) }}" required>
            @error('nom')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Matière --}}
        <div class="mb-3">
            <label for="matiere_id" class="form-label fw-semibold">Matière <span class="text-danger">*</span></label>
            <select name="matiere_id" id="matiere_id" class="form-select @error('matiere_id') is-invalid @enderror" required>
                <option value="">-- Sélectionner --</option>
                @foreach ($matieres as $matiere)
                    <option value="{{ $matiere->id }}" {{ (old('matiere_id', $fax->matiere_id) == $matiere->id) ? 'selected' : '' }}>
                        {{ $matiere->nom }}
                    </option>
                @endforeach
            </select>
            @error('matiere_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Niveau --}}
        <div class="mb-3">
            <label for="niveau_id" class="form-label fw-semibold">Niveau <span class="text-danger">*</span></label>
            <select name="niveau_id" id="niveau_id" class="form-select @error('niveau_id') is-invalid @enderror" required>
                <option value="">-- Sélectionner --</option>
                @foreach ($niveaux as $niveau)
                    <option value="{{ $niveau->id }}" {{ (old('niveau_id', $fax->niveau_id) == $niveau->id) ? 'selected' : '' }}>
                        {{ $niveau->nom }}
                    </option>
                @endforeach
            </select>
            @error('niveau_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Filière --}}
        <div class="mb-3">
            <label for="filiere_id" class="form-label fw-semibold">Filière <span class="text-danger">*</span></label>
            <select name="filiere_id" id="filiere_id" class="form-select @error('filiere_id') is-invalid @enderror" required>
                <option value="">-- Sélectionner --</option>
                @foreach ($filieres as $filiere)
                    <option value="{{ $filiere->id }}" {{ (old('filiere_id', $fax->filiere_id) == $filiere->id) ? 'selected' : '' }}>
                        {{ $filiere->nom }}
                    </option>
                @endforeach
            </select>
            @error('filiere_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Fichier --}}
        <div class="mb-3">
            <label for="fichier" class="form-label fw-semibold">Fichier <small class="text-muted">(laisser vide pour ne pas changer)</small></label>
            <input type="file" name="fichier" id="fichier" class="form-control @error('fichier') is-invalid @enderror" accept=".pdf,.doc,.docx,.pptx,.zip">
            @error('fichier')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            @if ($fax->fichier)
                <small class="text-muted">Fichier actuel : <a href="{{ asset('storage/' . $fax->fichier) }}" target="_blank">Voir</a></small>
            @endif
        </div>

        <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Enregistrer les modifications</button>
    </form>
</div>
@endsection


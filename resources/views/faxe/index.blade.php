@extends('layouts.app')

@section('content')
<div class="container py-4">

    <h1 class="mb-4 text-primary fw-bold">Gestion des Faxes</h1>

    {{-- Message de succès --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
        </div>
    @endif

    {{-- Bouton pour ouvrir le modal d'ajout --}}
    <button class="mb-4 btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal">
        <i class="bi bi-plus-circle"></i> Ajouter un fax
    </button>

    {{-- Tableau des fax --}}
    <div class="table-responsive">
        <table class="table align-middle table-bordered table-hover">
            <thead class="text-center table-light">
                <tr>
                    <th>Nom</th>
                    <th>Matière</th>
                    <th>Niveau</th>
                    <th>Filière</th>
                    <th>Fichier</th>
                    <th style="width: 160px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($faxes as $faxe)
                    <tr>
                        <td>{{ $faxe->nom }}</td>
                        <td>{{ $faxe->matiere->nom ?? '-' }}</td>
                        <td>{{ $faxe->niveau->nom ?? '-' }}</td>
                        <td>{{ $faxe->filiere->nom ?? '-' }}</td>
                        <td class="text-center">
                            @if($faxe->fichier)
                                <a href="{{ asset('storage/' . $faxe->fichier) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-file-earmark-text"></i> Voir
                                </a>
                            @else
                                <span class="text-muted">Aucun fichier</span>
                            @endif
                        </td>
                        <td class="text-center">
                            {{-- Lien Modifier vers une page dédiée --}}
                            <a href="{{ route('admin.faxes.edit', $faxe->id) }}" class="btn btn-sm btn-warning me-1" title="Modifier">
                                <i class="bi bi-pencil"></i>
                            </a>

                            {{-- Formulaire suppression --}}
                            <form action="{{ route('admin.faxes.destroy', $faxe->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Voulez-vous vraiment supprimer ce fax ?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" type="submit" title="Supprimer">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted fst-italic">Aucun fax disponible.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Modal Ajout --}}
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('admin.faxes.store') }}" method="POST" enctype="multipart/form-data" class="modal-content">
                @csrf
                <div class="text-white modal-header bg-success">
                    <h5 class="modal-title" id="addModalLabel"><i class="bi bi-plus-circle"></i> Ajouter un nouveau Fax</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fermer"></button>
                </div>
                <div class="modal-body">

                    {{-- Nom --}}
                    <div class="mb-3">
                        <label for="nom" class="form-label fw-semibold">Nom <span class="text-danger">*</span></label>
                        <input type="text" name="nom" id="nom" class="form-control @error('nom') is-invalid @enderror" value="{{ old('nom') }}" required>
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
                                <option value="{{ $matiere->id }}" {{ old('matiere_id') == $matiere->id ? 'selected' : '' }}>
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
                                <option value="{{ $niveau->id }}" {{ old('niveau_id') == $niveau->id ? 'selected' : '' }}>
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
                                <option value="{{ $filiere->id }}" {{ old('filiere_id') == $filiere->id ? 'selected' : '' }}>
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
                        <label for="fichier" class="form-label fw-semibold">Fichier <span class="text-danger">*</span></label>
                        <input type="file" name="fichier" id="fichier" class="form-control @error('fichier') is-invalid @enderror" required accept=".pdf,.doc,.docx,.pptx,.zip">
                        @error('fichier')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-success"><i class="bi bi-check-circle"></i> Ajouter</button>
                </div>
            </form>
        </div>
    </div>

</div>

{{-- Script pour rouvrir le modal ajout en cas d'erreurs --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        @if ($errors->any() && !old('faxe_id'))
            var addModal = new bootstrap.Modal(document.getElementById('addModal'));
            addModal.show();
        @endif
    });
</script>

@endsection

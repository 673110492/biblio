@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col">
        <div class="page-title-container">
            <div class="row">
                <div class="col-12 col-md-7">
                    <h1 class="mb-0 pb-0 display-4" id="title">LISTE DES MATIÈRES</h1>
                    <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                        <ul class="breadcrumb pt-0">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Cours</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Liste</li>
                        </ul>
                    </nav>
                </div>
                <div class="col-12 col-md-5 d-flex align-items-start justify-content-end">
                    <button class="btn btn-outline-primary btn-icon btn-icon-start w-100 w-md-auto" data-bs-toggle="modal" data-bs-target="#addMatiereModal">
                        <i data-acorn-icon="plus"></i>
                        Ajouter une matière
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Liste des matières -->
<section class="scroll-section mt-4" id="alwaysResponsive">
    <div class="card mb-5">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Code</th>
                        <th>Titre</th>
                        <th>Crédit</th>
                        <th>Niveau</th>
                        <th>Filière</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($matieres as $matiere)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $matiere->code }}</td>
                        <td>{{ $matiere->titre }}</td>
                        <td>{{ $matiere->credit }}</td>
                        <td>{{ $matiere->niveau->nom }}</td>
                        <td>{{ $matiere->filiere->nom }}</td>
                        <td>
                            <div class="d-flex gap-1">
                               
                                <a href="{{ route('matieres.edit', $matiere->id) }}" class="btn btn-secondary btn-sm">
                                    <i class="fa fa-pencil-square-o"></i>
                                </a>
                                <form method="POST" action="{{ route('matieres.destroy', $matiere->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Confirmer la suppression ?')">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- Modal d'ajout -->
<div class="modal fade" id="addMatiereModal" tabindex="-1" aria-labelledby="addMatiereModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('matieres.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addMatiereModalLabel">Ajouter une matière</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="code" class="form-label">Code</label>
                        <input type="text" name="code" id="code" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="titre" class="form-label">Titre</label>
                        <input type="text" name="titre" id="titre" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="credit" class="form-label">Crédit</label>
                        <input type="number" name="credit" id="credit" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="niveau_id" class="form-label">Niveau</label>
                        <select name="niveau_id" id="niveau_id" class="form-select" required>
                            <option value="" disabled selected>Choisir...</option>
                            @foreach ($niveaux as $niveau)
                                <option value="{{ $niveau->id }}">{{ $niveau->nom }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="filiere_id" class="form-label">Filière</label>
                        <select name="filiere_id" id="filiere_id" class="form-select" required>
                            <option value="" disabled selected>Choisir...</option>
                            @foreach ($filieres as $filiere)
                                <option value="{{ $filiere->id }}">{{ $filiere->nom }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

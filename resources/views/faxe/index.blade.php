@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col">
        <div class="page-title-container">
            <div class="row">
                <div class="col-12 col-md-7">
                    <h1 class="pb-0 mb-0 display-4" id="title">Liste des Faxes</h1>
                    <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                        <ul class="pt-0 breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                            <li class="breadcrumb-item"><a href="#">Cours</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Faxes</li>
                        </ul>
                    </nav>
                </div>
                <div class="col-12 col-md-5 d-flex align-items-start justify-content-end">
                    <button class="btn btn-outline-primary btn-icon w-100 w-md-auto" data-bs-toggle="modal" data-bs-target="#addModal">
                        <i class="fa fa-plus"></i> Ajouter un fax
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="mt-4 scroll-section" id="alwaysResponsive">
    <div class="mb-5 card">
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Matière</th>
                        <th>Niveau</th>
                        <th>Filière</th>
                        <th>Fichier</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($faxes as $faxe)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $faxe->nom }}</td>
                        <td>{{ $faxe->matiere->titre ?? '-' }}</td>
                        <td>{{ $faxe->niveau->nom ?? '-' }}</td>
                        <td>{{ $faxe->filiere->nom ?? '-' }}</td>
                        <td>
                            @if($faxe->fichier)
                                <a href="{{ asset('storage/' . $faxe->fichier) }}" target="_blank" class="btn btn-sm btn-outline-primary">Voir</a>
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            <button class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#editModal{{ $faxe->id }}">
                                <i class="fa fa-pencil">
                                    Modifier
                                </i>
                            </button>

                            <form action="{{ route('faxes.destroy', $faxe->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Voulez-vous vraiment supprimer ce fax ?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" type="submit">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>

                    <!-- Modal Edition -->
                    <div class="modal fade" id="editModal{{ $faxe->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $faxe->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="{{ route('faxes.update', $faxe->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel{{ $faxe->id }}">Modifier Fax</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="text" name="nom" class="mb-3 form-control" placeholder="Nom du fax" value="{{ old('nom', $faxe->nom) }}" required>

                                        <label for="matiere_id_{{ $faxe->id }}">Matière</label>
                                        <select id="matiere_id_{{ $faxe->id }}" name="matiere_id" class="mb-3 form-control" required>
                                            @foreach ($matieres as $matiere)
                                            <option value="{{ $matiere->id }}" {{ (old('matiere_id', $faxe->matiere_id) == $matiere->id) ? 'selected' : '' }}>
                                                {{ $matiere->titre }}
                                            </option>
                                            @endforeach
                                        </select>

                                        <label for="niveau_id_{{ $faxe->id }}">Niveau</label>
                                        <select id="niveau_id_{{ $faxe->id }}" name="niveau_id" class="mb-3 form-control" required>
                                            @foreach ($niveaux as $niveau)
                                            <option value="{{ $niveau->id }}" {{ (old('niveau_id', $faxe->niveau_id) == $niveau->id) ? 'selected' : '' }}>
                                                {{ $niveau->nom }}
                                            </option>
                                            @endforeach
                                        </select>

                                        <label for="filiere_id_{{ $faxe->id }}">Filière</label>
                                        <select id="filiere_id_{{ $faxe->id }}" name="filiere_id" class="mb-3 form-control" required>
                                            @foreach ($filieres as $filiere)
                                            <option value="{{ $filiere->id }}" {{ (old('filiere_id', $faxe->filiere_id) == $filiere->id) ? 'selected' : '' }}>
                                                {{ $filiere->nom }}
                                            </option>
                                            @endforeach
                                        </select>

                                        <label>Fichier (laisser vide pour garder le fichier actuel)</label>
                                        <input type="file" name="fichier" class="form-control">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    @empty
                    <tr>
                        <td colspan="7" class="text-center">Aucun fax trouvé.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- Modal Ajout -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('faxes.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Ajouter un nouveau Fax</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                </div>
                <div class="modal-body">
                    <input type="text" name="nom" class="mb-3 form-control" placeholder="Nom du fax" value="{{ old('nom') }}" required>

                    <label for="matiere_id">Matière</label>
                    <select id="matiere_id" name="matiere_id" class="mb-3 form-control" required>
                        @foreach ($matieres as $matiere)
                        <option value="{{ $matiere->id }}" {{ old('matiere_id') == $matiere->id ? 'selected' : '' }}>
                            {{ $matiere->titre }}
                        </option>
                        @endforeach
                    </select>

                    <label for="niveau_id">Niveau</label>
                    <select id="niveau_id" name="niveau_id" class="mb-3 form-control" required>
                        @foreach ($niveaux as $niveau)
                        <option value="{{ $niveau->id }}" {{ old('niveau_id') == $niveau->id ? 'selected' : '' }}>
                            {{ $niveau->nom }}
                        </option>
                        @endforeach
                    </select>

                    <label for="filiere_id">Filière</label>
                    <select id="filiere_id" name="filiere_id" class="mb-3 form-control" required>
                        @foreach ($filieres as $filiere)
                        <option value="{{ $filiere->id }}" {{ old('filiere_id') == $filiere->id ? 'selected' : '' }}>
                            {{ $filiere->nom }}
                        </option>
                        @endforeach
                    </select>

                    <label>Fichier</label>
                    <input type="file" name="fichier" class="form-control" required>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Ajouter</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

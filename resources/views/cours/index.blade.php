@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col">
        <div class="page-title-container">
            <div class="row">
                <div class="col-12 col-md-7">
                    <h1 class="pb-0 mb-0 display-4" id="title">Liste des cours</h1>
                    <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                        <ul class="pt-0 breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('cours') }}">Cours</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Liste</li>
                        </ul>
                    </nav>
                </div>
                <div class="col-12 col-md-5 d-flex align-items-start justify-content-end">
                    <!-- Bouton pour ouvrir le modal -->
                    <button type="button" class="btn btn-outline-primary btn-icon btn-icon-start w-100 w-md-auto" data-bs-toggle="modal" data-bs-target="#addCoursModal">
                        <i data-acorn-icon="plus"></i> Add New
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="scroll-section" id="alwaysResponsive">
    <div class="mb-5 card">
        <div class="card-body">
            <table class="table align-middle table-striped">
                <thead>
                    <tr>
                        <th scope="col">N</th>
                        <th scope="col">Image</th>
                        <th scope="col">Titre</th>
                        <th scope="col">Propriétaire</th>
                        <th scope="col">Semestre</th>
                        <th scope="col">Matière</th>
                        <th scope="col">Filière</th> {{-- ajouté --}}
                        <th scope="col">Professeur</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($cours as $cour)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>

                        <td>
                            @if ($cour->image)
                                <img src="{{ asset('storage/' . $cour->image) }}" alt="Image du cours" style="max-width: 80px; max-height: 60px; object-fit: cover;">
                            @else
                                <span class="text-muted">Pas d'image</span>
                            @endif
                        </td>

                        <td>{{ $cour->titre }}</td>
                        <td>{{ $cour->proprietaire ?? '-' }}</td>
                        <td>{{ $cour->semestre }}</td>
                        <td>{{ $cour->matiere->titre ?? '-' }}</td>
                        <td>{{ $cour->filiere->nom ?? '-' }}</td> {{-- affichage filière --}}
                        <td>{{ $cour->user->nom ?? '-' }}</td>

                        <td>
                            <a href="{{ url('cours/' . $cour->id) }}" class="mb-1 btn btn-info" title="Voir">
                                <i class="fa fa-eye"></i>
                            </a>

                            <a href="{{ url('cours/' . $cour->id . '/edit') }}" class="mb-1 btn btn-secondary" title="Modifier">
                                <i class="fa fa-pencil-square-o"></i>
                            </a>

                            <!-- Bouton suppression qui ouvre le modal -->
                            <button
                                class="mb-1 btn btn-danger"
                                type="button"
                                data-bs-toggle="modal"
                                data-bs-target="#deleteCoursModal"
                                data-cours-id="{{ $cour->id }}"
                                data-cours-titre="{{ $cour->titre }}"
                                title="Supprimer"
                            >
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $cours->links() !!}
        </div>
    </div>
</section>

<!-- Modal d'ajout de cours -->
<div class="modal fade" id="addCoursModal" tabindex="-1" aria-labelledby="addCoursModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <form action="{{ url('cours') }}" method="POST" enctype="multipart/form-data" class="modal-content">
      @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="addCoursModalLabel">Ajouter un nouveau cours</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body">

        <div class="mb-3">
          <label for="titre" class="form-label">Titre</label>
          <input type="text" class="form-control" id="titre" name="titre" required value="{{ old('titre') }}">
        </div>

        <div class="mb-3">
          <label for="fichier" class="form-label">Fichier</label>
          <input type="file" class="form-control" id="fichier" name="fichier" required>
        </div>

        <div class="mb-3">
          <label for="image" class="form-label">Image (optionnelle)</label>
          <input type="file" class="form-control" id="image" name="image" accept="image/*">
        </div>

        <div class="mb-3">
          <label for="proprietaire" class="form-label">Propriétaire (optionnel)</label>
          <input type="text" class="form-control" id="proprietaire" name="proprietaire" value="{{ old('proprietaire') }}">
        </div>

        <div class="mb-3">
          <label for="semestre" class="form-label">Semestre</label>
          <select class="form-select" id="semestre" name="semestre" required>
            <option value="" disabled {{ old('semestre') ? '' : 'selected' }}>Sélectionner le semestre</option>
            <option value="1" {{ old('semestre') == '1' ? 'selected' : '' }}>1</option>
            <option value="2" {{ old('semestre') == '2' ? 'selected' : '' }}>2</option>
          </select>
        </div>

        <div class="mb-3">
          <label for="description" class="form-label">Description</label>
          <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
          <label for="matiere_id" class="form-label">Matière</label>
          <select class="form-select" id="matiere_id" name="matiere_id" required>
            <option value="" disabled {{ old('matiere_id') ? '' : 'selected' }}>Sélectionner la matière</option>
            @foreach($matieres as $matiere)
              <option value="{{ $matiere->id }}" {{ old('matiere_id') == $matiere->id ? 'selected' : '' }}>{{ $matiere->titre }}</option>
            @endforeach
          </select>
        </div>

        <div class="mb-3">
          <label for="filiere_id" class="form-label">Filière</label>
          <select class="form-select" id="filiere_id" name="filiere_id" required>
            <option value="" disabled {{ old('filiere_id') ? '' : 'selected' }}>Sélectionner la filière</option>
            @foreach($filieres as $filiere)
              <option value="{{ $filiere->id }}" {{ old('filiere_id') == $filiere->id ? 'selected' : '' }}>{{ $filiere->nom }}</option>
            @endforeach
          </select>
        </div>

        <div class="mb-3">
          <label for="user_id" class="form-label">Professeur</label>
          <select class="form-select" id="user_id" name="user_id" required>
            <option value="" disabled {{ old('user_id') ? '' : 'selected' }}>Sélectionner le professeur</option>
            @foreach($users as $user)
              <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>{{ $user->nom }}</option>
            @endforeach
          </select>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        <button type="submit" class="btn btn-primary">Ajouter le cours</button>
      </div>
    </form>
  </div>
</div>

<!-- Modal de confirmation suppression -->
<div class="modal fade" id="deleteCoursModal" tabindex="-1" aria-labelledby="deleteCoursModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" id="deleteCoursForm">
        @csrf
        @method('DELETE')

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteCoursModalLabel">Confirmer la suppression</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>
            <div class="modal-body">
                <p>Êtes-vous sûr de vouloir supprimer le cours <strong id="coursTitre"></strong> ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </div>
        </div>
    </form>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var deleteModal = document.getElementById('deleteCoursModal');
    var deleteForm = document.getElementById('deleteCoursForm');
    var coursTitre = document.getElementById('coursTitre');

    deleteModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var coursId = button.getAttribute('data-cours-id');
        var titre = button.getAttribute('data-cours-titre');

        coursTitre.textContent = titre;

        // Met à jour l'action du formulaire pour correspondre à la route DELETE standard de Laravel
        deleteForm.action = '/cours/' + coursId;
    });
});
</script>

@endsection

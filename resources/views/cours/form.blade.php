<form action="{{ isset($cour) ? route('cours.update', $cour->id) : route('cours.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if(isset($cour))
        @method('PUT')
    @endif

    <label class="mb-3 top-label">
        <input class="form-control" type="text" name="titre" value="{{ old('titre', isset($cour) ? $cour->titre : '') }}" required>
        <span>Titre</span>
    </label>

    <label class="mb-3 top-label">
        <input class="form-control" type="file" name="fichier" id="fichier" {{ isset($cour) ? '' : 'required' }}>
        <span>Selectionner un fichier</span>
    </label>

    <select class="mb-3 form-select" name="semestre" required>
        <option value="" disabled {{ old('semestre', isset($cour) ? $cour->semestre : '') == '' ? 'selected' : '' }}>Selectionner le semestre</option>
        <option value="1" {{ old('semestre', isset($cour) ? $cour->semestre : '') == '1' ? 'selected' : '' }}>1</option>
        <option value="2" {{ old('semestre', isset($cour) ? $cour->semestre : '') == '2' ? 'selected' : '' }}>2</option>
    </select>

    <div class="mb-3 form-floating">
        <textarea class="form-control" name="description" rows="3" placeholder="Description">{{ old('description', isset($cour) ? $cour->description : '') }}</textarea>
        <label>Description</label>
    </div>

    <select class="mb-3 form-select" name="matiere_id" required>
        <option value="" disabled {{ old('matiere_id', isset($cour) ? $cour->matiere_id : '') == '' ? 'selected' : '' }}>Selectionner la matière</option>
        @foreach($matieres as $matiere)
            <option value="{{ $matiere->id }}" {{ old('matiere_id', isset($cour) ? $cour->matiere_id : '') == $matiere->id ? 'selected' : '' }}>
                {{ $matiere->titre }}
            </option>
        @endforeach
    </select>

    <select class="mb-3 form-select" name="user_id" required>
        <option value="" disabled {{ old('user_id', isset($cour) ? $cour->user_id : '') == '' ? 'selected' : '' }}>Selectionner le professeur</option>
        @foreach($users as $user)
            <option value="{{ $user->id }}" {{ old('user_id', isset($cour) ? $cour->user_id : '') == $user->id ? 'selected' : '' }}>
                {{ $user->nom }}
            </option>
        @endforeach
    </select>

    <select class="mb-3 form-select" name="filiere_id" required>
        <option value="" disabled {{ old('filiere_id', isset($cour) ? $cour->filiere_id : '') == '' ? 'selected' : '' }}>Selectionner la filière</option>
        @foreach($filieres as $filiere)
            <option value="{{ $filiere->id }}" {{ old('filiere_id', isset($cour) ? $cour->filiere_id : '') == $filiere->id ? 'selected' : '' }}>
                {{ $filiere->nom }}
            </option>
        @endforeach
    </select>

    <label class="mb-3 top-label">
        <input class="form-control" type="text" name="proprietaire" value="{{ old('proprietaire', isset($cour) ? $cour->proprietaire : '') }}">
        <span>Propriétaire (optionnel)</span>
    </label>

    <label class="mb-3 top-label">
        <input class="form-control" type="file" name="image" id="image">
        <span>Image (optionnel)</span>
    </label>

    <button type="submit" class="btn btn-primary">
        {{ isset($cour) ? 'Mettre à jour' : 'Ajouter' }}
    </button>
</form>


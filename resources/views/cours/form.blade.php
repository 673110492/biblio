<label class="mb-3 top-label">
    <input class="form-control" type="text" value="{{ isset($cour) ? $cour->titre : '' }}" name="titre" required>
    <span>Titre</span>
</label>

<label class="mb-3 top-label">
    <input class="form-control" type="file" name="fichier" id="fichier" {{ isset($cour) ? '' : 'required' }}>
    <span>Selectionner un fichier</span>
</label>

<select class="form-select" name="semestre" required>
    <option value="" disabled {{ !isset($cour) ? 'selected' : '' }}>Selectionner le semestre</option>
    <option value="1" {{ isset($cour) && $cour->semestre == 1 ? 'selected' : '' }}>1</option>
    <option value="2" {{ isset($cour) && $cour->semestre == 2 ? 'selected' : '' }}>2</option>
</select> <br>

<div class="form-floating mb-3">
    <textarea class="form-control" placeholder="Description" rows="3" name="description" required>{{ isset($cour) ? $cour->description : '' }}</textarea>
    <label>Description</label>
</div>

<select class="form-select" name="matiere_id" required>
    <option value="" disabled selected>Selectionner la matière</option>
    @foreach($matieres as $matiere)
        <option value="{{ $matiere->id }}" {{ isset($cour) && $cour->matiere && $cour->matiere->id == $matiere->id ? 'selected' : '' }}>
            {{ $matiere->titre }}
        </option>
    @endforeach
</select> <br>

<select class="form-select" name="user_id" required>
    <option value="" disabled selected>Selectionner le professeur</option>
    @foreach($users as $user)
        <option value="{{ $user->id }}" {{ isset($cour) && $cour->user && $cour->user->id == $user->id ? 'selected' : '' }}>
            {{ $user->nom }}
        </option>
    @endforeach
</select> <br>

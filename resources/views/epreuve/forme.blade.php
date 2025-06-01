<select class="form-select" id="specificSizeSelect" name="session">
    <option selected="selected">Selectionner la session</option>
    <option value="cc" {{ isset($epreuve) && $epreuve->session == 'cc' ? 'selected="selected"' : '' }}>cc</option>
    <option value="normal" {{ isset($epreuve) && $epreuve->session == 'normal' ? 'selected="selected"' : '' }}>Normal</option>
</select>
<br>

<label class="mb-3 top-label">
    <input class="form-control" type="text" value="{{ isset($epreuve) ? $epreuve->titre : '' }}" name="titre" required="">
    <span>Titre</span>
</label>

<label class="mb-3 top-label">
    <input class="form-control" type="file" name="fichier" required="">
    <span>Selectionner un fichier</span>
</label>

<select class="form-select" id="specificSizeSelect" name="semestre">
    <option selected="selected">Selectionner le semestre</option>
    <option value="1" {{ isset($epreuve) && $epreuve->semestre == 1 ? 'selected="selected"' : '' }}>1</option>
    <option value="2" {{ isset($epreuve) && $epreuve->semestre == 2 ? 'selected="selected"' : '' }}>2</option>
</select>
<br>

<label class="mb-3 top-label">
    <input class="form-control" type="text" value="{{ isset($epreuve) ? $epreuve->annee : '' }}" name="annee">
    <span>Année</span>
</label>

<select class="form-select" id="specificSizeSelect" name="matiere_id">
    <option selected="selected">Selectionner la matière</option>
    @foreach($matieres as $matiere)
        <option value="{{ $matiere->id }}" {{ isset($epreuve) && $epreuve->matiere_id == $matiere->id ? 'selected="selected"' : '' }}>
            {{ $matiere->titre }}
        </option>
    @endforeach
</select>
<br>

<select class="form-select" id="specificSizeSelect" name="user_id">
    <option selected="selected">Selectionner le professeur</option>
    @foreach($users as $user)
        <option value="{{ $user->id }}" {{ isset($epreuve) && $epreuve->user_id == $user->id ? 'selected="selected"' : '' }}>
            {{ $user->nom }}
        </option>
    @endforeach
</select>
<br>

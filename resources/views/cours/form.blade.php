<label class="mb-3 top-label">
    <input class="form-control" type="text" value="{{ isset($cour) ? $cour->titre : '' }}" name="titre" required="" >
    <span>Titre</span>
</label>

<label class="mb-3 top-label">
    <input class="form-control" type="file" value="{{ isset($cour) ? $cour->fichier : '' }}" name="fichier" required="" id="fichier">
    <span>Selectionner un fichier</span>
</label>

<select class="form-select" id="specificSizeSelect" name="semestre">
    <option disabled>Selectionner le semestres</option>
    <option value="1" {{isset($cour) && $cour->semestre==1 ? 'selected="selected"' : ''}}>1</option>
    <option value="2" {{isset($cour) && $cour->semestre==2 ? 'selected="selected"' : ''}}>2</option>
</select> <br>

<div class="form-floating mb-3">
    <textarea class="form-control error" placeholder="Description" rows="3" name="description" required="" _mstplaceholder="94653" _msthash="223" aria-invalid="true" aria-describedby="addressFloatingLabel-error">{{ isset($cour) ? $cour->description : '' }}</textarea>
    <label _msttexthash="94237" _msthash="224">Description</label>
</div>

<select class="form-select" id="specificSizeSelect"  name="matiere_id">
    <option disabled>Selectionner la matières</option>
    @foreach($matieres as $matiere)
        <option value="{{ $matiere->id }}" {{isset($cour) && $cour->matiere->id==$matiere->id ? 'selected="selected"' : ''}}>{{ $matiere->titre}}</option>
    @endforeach
</select> <br>

    <select class="form-select" id="specificSizeSelect" name="user_id">
    <option disabled>Selectionner le professeur</option>
    @foreach($users as $user)
        <option value="{{ $user->id }}" {{isset($cour) && $cour->user->id==$user->id ? 'selected="selected"' : ''}}>{{ $user->nom }} </option>
    @endforeach
</select> <br>
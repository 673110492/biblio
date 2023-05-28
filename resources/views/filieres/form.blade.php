 <label class="mb-3 top-label">
     <input class="form-control" type="text" value="{{ isset($filieres) ? $filieres->nom : '' }}" name="nom" required="">
     <span>Nom</span>
 </label>

 <label class="mb-3 top-label">
     <input class="form-control" type="text" value="{{ isset($filieres) ? $filieres->departement : '' }}" name="departement" required="">
     <span>Departement</span>
 </label>

 <label class="mb-3 top-label">
     <input class="form-control" type="text" value="{{ isset($filieres) ? $filieres->faculter : '' }}" name="faculter" required="">
     <span>Faculter</span>
 </label>

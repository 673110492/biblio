@extends('layouts.app')

@section('content')

<h2>Détails du cours : {{ $cours->titre }}</h2>

<div style="display: flex; flex-wrap: wrap; gap: 1.5rem; max-width: 1000px; margin: auto;">

  <div style="flex: 1 1 200px; border: 1px solid #ddd; padding: 1rem; border-radius: 8px; box-shadow: 0 2px 6px rgb(0 0 0 / 0.1);">
    <strong>Semestre :</strong>
    <p>{{ $cours->semestre }}</p>
  </div>

  <div style="flex: 2 1 300px; border: 1px solid #ddd; padding: 1rem; border-radius: 8px; box-shadow: 0 2px 6px rgb(0 0 0 / 0.1);">
    <strong>Description :</strong>
    <p>{{ $cours->description }}</p>
  </div>

  <div style="flex: 1 1 200px; border: 1px solid #ddd; padding: 1rem; border-radius: 8px; box-shadow: 0 2px 6px rgb(0 0 0 / 0.1);">
    <strong>Matière :</strong>
    <p>{{ $cours->matiere->titre }}</p>
  </div>

  <div style="flex: 1 1 200px; border: 1px solid #ddd; padding: 1rem; border-radius: 8px; box-shadow: 0 2px 6px rgb(0 0 0 / 0.1);">
    <strong>Professeur :</strong>
    <p>{{ $cours->user->nom }}</p>
  </div>

  <div style="flex: 1 1 200px; border: 1px solid #ddd; padding: 1rem; border-radius: 8px; box-shadow: 0 2px 6px rgb(0 0 0 / 0.1);">
    <strong>Propriétaire :</strong>
    <p>{{ $cours->proprietaire ?? '-' }}</p>
  </div>

</div>

<div style="max-width: 800px; margin: 2rem auto;">
  <p><strong>Fichier PDF :</strong></p>
  <embed src="{{ asset('storage/cours/' . $cours->fichier) }}" type="application/pdf" width="100%" height="600px" style="border: 1px solid #ccc; border-radius: 4px;" />
</div>

<div style="max-width: 800px; margin: auto;">
  <a href="{{ url('cours') }}" class="btn btn-secondary mt-3">Retour à la liste</a>
</div>

@endsection

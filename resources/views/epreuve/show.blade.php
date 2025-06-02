@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Détail de l'épreuve</h1>

    <div class="card">
        <div class="card-body">
            <h3 class="mb-3 card-title">{{ $epreuve->titre }}</h3>

            <p><strong>Session :</strong> {{ ucfirst($epreuve->session) }}</p>
            <p><strong>Semestre :</strong> {{ $epreuve->semestre }}</p>
            <p><strong>Année :</strong> {{ $epreuve->annee ?? 'Non spécifiée' }}</p>
            <p><strong>Matière :</strong> {{ $epreuve->matiere->titre ?? 'N/A' }}</p>
            <p><strong>Professeur :</strong> {{ $epreuve->user->nom ?? 'N/A' }}</p>
            <p><strong>Filière :</strong> {{ $epreuve->filiere->nom ?? 'N/A' }}</p>

            <p><strong>Fichier :</strong></p>
            @if($epreuve->fichier)
                <div style="width: 100%; height: 600px; border: 1px solid #ddd; border-radius: 4px; overflow: hidden;">
                    <iframe
                        src="{{ asset('storage/' . $epreuve->fichier) }}"
                        width="100%"
                        height="100%"
                        style="border:none;"
                        allowfullscreen
                    >
                        Ce navigateur ne supporte pas l'affichage des PDF intégrés. Vous pouvez
                        <a href="{{ asset('storage/' . $epreuve->fichier) }}" target="_blank" rel="noopener noreferrer">télécharger le fichier ici</a>.
                    </iframe>
                </div>
            @else
                <p>Aucun fichier disponible.</p>
            @endif

            <hr>
            <a href="{{ route('epreuves.index') }}" class="btn btn-secondary">Retour à la liste</a>
        </div>
    </div>
</div>
@endsection

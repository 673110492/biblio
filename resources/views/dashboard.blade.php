@extends('layouts.app')

@section('content')

<!-- Bloc d’alerte / annonce -->
<div class="mb-5 alert alert-info d-flex align-items-center" role="alert" style="font-size: 1.2rem; font-weight: 600;">
    <i class="fas fa-book me-3" style="font-size: 1.5rem;"></i>
    Bienvenue dans votre bibliothèque en ligne : accédez à des ressources pédagogiques, empruntez des ouvrages et suivez vos lectures !
</div>

<div class="row g-4">
    <!-- Cours -->
    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
        <div class="shadow-sm card card-stats card-round h-100">
            <div class="card-body d-flex align-items-center">
                <div class="icon-big text-primary me-3">
                    <i class="fas fa-chalkboard fa-2x"></i>
                </div>
                <div>
                    <p class="mb-1 card-category fw-semibold">Cours</p>
                    <h4 class="mb-0 card-title">{{ $counts['cours'] }}</h4>
                </div>
            </div>
        </div>
    </div>

    <!-- Matières -->
    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
        <div class="shadow-sm card card-stats card-round h-100">
            <div class="card-body d-flex align-items-center">
                <div class="icon-big text-success me-3">
                    <i class="fas fa-book-open fa-2x"></i>
                </div>
                <div>
                    <p class="mb-1 card-category fw-semibold">Matières</p>
                    <h4 class="mb-0 card-title">{{ $counts['matieres'] }}</h4>
                </div>
            </div>
        </div>
    </div>

    <!-- Épreuves -->
    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
        <div class="shadow-sm card card-stats card-round h-100">
            <div class="card-body d-flex align-items-center">
                <div class="icon-big text-warning me-3">
                    <i class="fas fa-file-alt fa-2x"></i>
                </div>
                <div>
                    <p class="mb-1 card-category fw-semibold">Épreuves</p>
                    <h4 class="mb-0 card-title">{{ $counts['epreuves'] }}</h4>
                </div>
            </div>
        </div>
    </div>

    <!-- Niveaux -->
    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
        <div class="shadow-sm card card-stats card-round h-100">
            <div class="card-body d-flex align-items-center">
                <div class="icon-big text-danger me-3">
                    <i class="fas fa-layer-group fa-2x"></i>
                </div>
                <div>
                    <p class="mb-1 card-category fw-semibold">Niveaux</p>
                    <h4 class="mb-0 card-title">{{ $counts['niveaux'] }}</h4>
                </div>
            </div>
        </div>
    </div>

    <!-- Filières -->
    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
        <div class="shadow-sm card card-stats card-round h-100">
            <div class="card-body d-flex align-items-center">
                <div class="icon-big text-info me-3">
                    <i class="fas fa-sitemap fa-2x"></i>
                </div>
                <div>
                    <p class="mb-1 card-category fw-semibold">Filières</p>
                    <h4 class="mb-0 card-title">{{ $counts['filieres'] }}</h4>
                </div>
            </div>
        </div>
    </div>

    <!-- Sujets corrigés (Faxes) -->
    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
        <div class="shadow-sm card card-stats card-round h-100">
            <div class="card-body d-flex align-items-center">
                <div class="icon-big text-secondary me-3">
                    <i class="fas fa-file-signature fa-2x"></i>
                </div>
                <div>
                    <p class="mb-1 card-category fw-semibold">Sujets corrigés</p>
                    <h4 class="mb-0 card-title">{{ $counts['faxes'] }}</h4>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

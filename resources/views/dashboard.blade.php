@extends('layouts.app')
@section('content')

<!-- Bloc d’alerte / annonce -->
<div class="alert alert-info d-flex align-items-center mb-4" role="alert" style="font-size: 1.2rem; font-weight: 600;">
    <i class="fas fa-book me-3" style="font-size: 1.5rem;"></i>
    Bienvenue dans votre bibliothèque en ligne : accédez à des ressources pédagogiques, empruntez des ouvrages et suivez vos lectures !
</div>

<div class="row">
    <!-- Visiteurs -->
    <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-icon">
                        <div class="icon-big text-center icon-primary bubble-shadow-small">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                    <div class="col col-stats ms-3">
                        <div class="numbers">
                            <p class="card-category">Visiteurs</p>
                            <h4 class="card-title">1,294</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Livres disponibles -->
    <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-icon">
                        <div class="icon-big text-center icon-success bubble-shadow-small">
                            <i class="fas fa-book"></i>
                        </div>
                    </div>
                    <div class="col col-stats ms-3">
                        <div class="numbers">
                            <p class="card-category">Livres</p>
                            <h4 class="card-title">3,245</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Emprunts en cours -->
    <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-icon">
                        <div class="icon-big text-center icon-warning bubble-shadow-small">
                            <i class="fas fa-book-reader"></i>
                        </div>
                    </div>
                    <div class="col col-stats ms-3">
                        <div class="numbers">
                            <p class="card-category">Emprunts</p>
                            <h4 class="card-title">867</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Utilisateurs inscrits -->
    <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-icon">
                        <div class="icon-big text-center icon-danger bubble-shadow-small">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                    </div>
                    <div class="col col-stats ms-3">
                        <div class="numbers">
                            <p class="card-category">Utilisateurs</p>
                            <h4 class="card-title">523</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Autres ressources -->
    <div class="col-sm-6 col-md-3 mt-4">
        <div class="card card-stats card-round">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-icon">
                        <div class="icon-big text-center icon-info bubble-shadow-small">
                            <i class="fas fa-archive"></i>
                        </div>
                    </div>
                    <div class="col col-stats ms-3">
                        <div class="numbers">
                            <p class="card-category">Autres ressources</p>
                            <h4 class="card-title">132</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistiques de consultation -->
    <div class="col-sm-6 col-md-3 mt-4">
        <div class="card card-stats card-round">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-icon">
                        <div class="icon-big text-center icon-secondary bubble-shadow-small">
                            <i class="fas fa-chart-line"></i>
                        </div>
                    </div>
                    <div class="col col-stats ms-3">
                        <div class="numbers">
                            <p class="card-category">Consultations</p>
                            <h4 class="card-title">7,984</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection

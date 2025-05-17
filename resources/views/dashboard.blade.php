@extends('layouts.app')
@section('content')

<!-- Bloc d’alerte / annonce -->
<div class="alert alert-success d-flex align-items-center mb-4" role="alert" style="font-size: 1.2rem; font-weight: 600;">
    <i class="fas fa-leaf me-3" style="font-size: 1.5rem;"></i>
    Projet de détection des maladies des plantes : système intelligent en cours de développement pour protéger vos cultures efficacement !
</div>

<div class="row">
    <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-icon">
                        <div class="icon-big text-center icon-primary bubble-shadow-small">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                    <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                            <p class="card-category">Visiteurs</p>
                            <h4 class="card-title">1,294</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ... reste du contenu ... -->
</div>

@endsection

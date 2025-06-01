<style>
    .table thead th {
        vertical-align: middle;
        text-align: center;
    }

    .table td, .table th {
        text-align: center;
    }

    .btn-group .btn i {
        vertical-align: middle;
    }
</style>

@extends('layouts.app')
@section('content')

<div class="mb-4 row">
    <div class="col">
        <div class="page-title-container">
            <div class="row align-items-center">
                <div class="col-md-7">
                    <h1 class="pb-0 mb-0 display-4" id="title">Liste des niveaux</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Niveaux</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-5 text-end">
                    <a href="{{ url('niveaux/create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-1"></i> Ajouter un niveau
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="scroll-section" id="alwaysResponsive">
    <div class="border-0 shadow-sm card">
        <div class="card-header bg-light d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Tableau des niveaux</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-middle table-hover table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Cycle</th>
                            <th scope="col" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($niveaux as $niveau)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $niveau->nom }}</td>
                            <td>{{ $niveau->cycle }}</td>
                            <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Actions">
                                    <a href="{{ url('niveaux/' . $niveau->id) }}" class="btn btn-sm btn-outline-info" title="Voir">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ url('niveaux/' . $niveau->id . '/edit') }}" class="btn btn-sm btn-outline-secondary" title="Modifier">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form method="POST" action="{{ url('/niveaux/' . $niveau->id) }}" class="d-inline-block" onsubmit="return confirm('Voulez-vous vraiment supprimer ce niveau ?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger" type="submit" title="Supprimer">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">Aucun niveau trouvé.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            <div class="mt-3 d-flex justify-content-end">
                {!! $niveaux->links() !!}
            </div>
        </div>
    </div>
</section>

@endsection

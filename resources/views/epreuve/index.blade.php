@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col">
        <div class="page-title-container">
            <div class="row">
                <div class="col-12 col-md-7">
                    <h1 class="pb-0 mb-0 display-4" id="title">Liste des épreuves</h1>
                    <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                        <ul class="pt-0 breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Epreuve</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Liste</li>
                        </ul>
                    </nav>
                </div>
                <div class="col-12 col-md-5 d-flex align-items-start justify-content-end">
                    <a href="{{ route('epreuves.create') }}" class="btn btn-outline-primary btn-icon btn-icon-start w-100 w-md-auto add-datatable">
                        <i data-acorn-icon="plus"></i>
                        Ajouter une épreuve
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="scroll-section" id="alwaysResponsive">
    <div class="mb-5 card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Session</th>
                        <th scope="col">Titre</th>
                        <th scope="col">Semestre</th>
                        <th scope="col">Année</th>
                        <th scope="col">Matière</th>
                        <th scope="col">Filière</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($epreuves as $epreuve)
                        <tr>
                            <td>{{ $epreuve->session }}</td>
                            <td>{{ $epreuve->titre }}</td>
                            <td>{{ $epreuve->semestre }}</td>
                            <td>{{ $epreuve->annee }}</td>
                            <td>{{ $epreuve->matiere->titre ?? 'N/A' }}</td>
                            <td>{{ $epreuve->filiere->nom ?? 'N/A' }}</td>
                            <td>
                                <form method="POST" action="{{ route('epreuves.destroy', $epreuve->id) }}">
                                    @csrf
                                    @method('DELETE')

                                    <a href="{{ route('epreuves.show', $epreuve->id) }}" class="mb-1 btn btn-info" title="Voir">
                                        <i class="fa fa-eye"></i>
                                    </a>

                                    <a href="{{ route('epreuves.edit', $epreuve->id) }}" class="mb-1 btn btn-secondary" title="Modifier">
                                        <i class="fa fa-pencil-square-o"></i>
                                    </a>

                                    <button type="submit" class="mb-1 btn btn-danger" title="Supprimer">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Pagination --}}
            {!! $epreuves->links() !!}
        </div>
    </div>
</section>

@endsection

@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col">
        <div class="page-title-container">
            <div class="row">
                <div class="col-12 col-md-7">
                    <h1 class="mb-0 pb-0 display-4" id="title">LISTE DES MATIERE</h1>
                    <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                        <ul class="breadcrumb pt-0">
                            <li class="breadcrumb-item"><a href="Dashboards.Default.html">Home</a></li>
                            <li class="breadcrumb-item"><a href="Interface.html">Cours</a></li>
                            <li class="breadcrumb-item"><a href="Interface.Plugins.html">Liste</a>
                            </li>
                            {{-- <li class="breadcrumb-item"><a href="Interface.Plugins.Datatables.html">Datatables</a></li> --}}
                        </ul>
                    </nav>
                </div>
                <div class="col-12 col-md-5 d-flex align-items-start justify-content-end">
                    <button type="button" class="btn btn-outline-primary btn-icon btn-icon-start w-100 w-md-auto add-datatable">
                        <i data-acorn-icon="plus"></i>
                        <a href="{{url('matieres/create')}}">
                            add new
                        </a>

                    </button>

                </div>
            </div>
        </div>
    </div>
</div>

<section class="scroll-section" id="alwaysResponsive">

    <div class="card mb-5">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">N</th>
                        <th scope="col">CODE</th>
                        <th scope="col">Titre</th>
                        <th scope="col">CREDIT</th>
                        <th scope="col">NIVEAU</th>
                        <th scope="col">FILIERES</th>
                        <th scope="col">Action</th>

                    </tr>
                </thead>

                <tbody>
                    @foreach ($matieres as $matiere)
                    <tr>
                        <th scope="row">1</th>
                        <td>{{ $matiere->code }}</td>
                        <td>{{ $matiere->titre}}</td>
                        <td>{{ $matiere->credit}}</td>
                        <td>{{ $matiere->niveau->nom}}</td>
                        <td>{{ $matiere->filiere->nom  }}</td>

                        <td>

                            <form method="POST" action="{{ url('/matieres/delete/' . $matiere->id)}}">
                                {{method_field('DELETE')}}
                                @csrf
                            <a href="{{url('matieres/' .$matiere->id)}}">
                                <button class="btn btn-info mb-1" type="button"> <i class="fa fa-eye"></i></button>

                            </a>
                            <a href="{{url('matieres/' .$matiere->id. '/edit')}}">
                                <button type="button" class="btn btn-secondary mb-1"><i class="fa fa-pencil-square-o"></i></button>

                            </a>
                                <button type="submit" class="btn btn-icon btn-icon-end btn-danger mb-1"> <i class="fa fa-trash"></i></button>

                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

@endsection

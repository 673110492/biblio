@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col">
        <div class="page-title-container">
            <div class="row">
                <div class="col-12 col-md-7">
                    <h1 class="mb-0 pb-0 display-4" id="title">LISTE DES LIVRES</h1>
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
                        <a href="{{url('livres/create')}}">
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
                        <th scope="col">Auteur</th>
                        <th scope="col">Titre</th>
                        {{-- <th scope="col">Fichier</th> --}}
                        <th scope="col">Descriptions</th>
                        <th scope="col">Matieres</th>
                        <th scope="col">Professeurs</th>
                        <th scope="col">Action</th>

                    </tr>
                </thead>

                <tbody>
                    @foreach ($livres as $livre)
                    <tr>
                        <th scope="row">1</th>

                        <td>{{ $livre->auteur }}</td>
                        <td>{{ $livre->titre }}</td>
                        {{-- <td>{{ $livre->fichier}}</td> --}}
                        <td>{{ $livre->descriptions }}</td>
                        <td>{{ $livre->semestre}}</td>
                        <td>{{ $livre->matiere->titre }}</td>
                        <td>{{ $livre->user->nom}}</td>
                        <td>

                            <form method="POST" action="{{ url('/livres/delete/' . $livre->id)}}">
                                {{method_field('DELETE')}}
                                @csrf
                                <a href="{{url('livres/' .$livre->id)}}">
                                    <button class="btn btn-info mb-1" type="button"> <i class="fa fa-eye"></i></button>
                                </a>
                                <a href="{{url('livres/' .$livre->id. '/edit')}}">
                                    <button type="button" class="btn btn-secondary mb-1"> <i class="fa fa-pencil-square-o"></i> </button>
                                </a>
                               <button class="btn btn-icon btn-icon-end btn-danger mb-1" type="submit">
                
                                    <i class="fa fa-trash"></i>
                                </button>
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

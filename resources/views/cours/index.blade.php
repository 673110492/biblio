@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col">
        <div class="page-title-container">
            <div class="row">
                <div class="col-12 col-md-7">
                    <h1 class="mb-0 pb-0 display-4" id="title">Liste des cours</h1>
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
                        <a href="{{url('cours/create')}}">
                            add new
                        </a>
                        {{-- <span>Add New</span> --}}
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
                        <th scope="col">Titre</th>
                        <th scope="col">Semestres</th>
                        <th scope="col">Matieres</th>
                        <th scope="col">Professeurs</th>
                        <th scope="col">Action</th>

                    </tr>
                </thead>

                <tbody>
                    @foreach ($cours as $cour)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $cour->titre }}</td>
                        {{-- <td>{{ $cour->fichier}}</td> --}}
                        <td>{{ $cour->semestre}}</td>
                        <td>{{ ($cour->matiere->titre )}}</td>
                        <td>{{ $cour->user->nom}}</td>
                        <td>

                            <form method="POST" action="{{ url('/cours/delete/' . $cour->id)}}">
                                {{method_field('DELETE')}}
                                @csrf
                                <a href="{{url('cours/' .$cour->id)}}">
                                 <button class="btn btn-info mb-1" type="button"> <i class="fa fa-eye"></i></button>
                                 </a>
                                <a href="{{url('cours/' .$cour->id. '/edit')}}">
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
            {!! $cours->links() !!}
        </div>
    </div>
</section>
@endsection

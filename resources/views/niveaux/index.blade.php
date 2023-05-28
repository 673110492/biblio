@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col">
        <div class="page-title-container">
            <div class="row">
                <div class="col-12 col-md-7">
                    <h1 class="mb-0 pb-0 display-4" id="title">Liste des niveaux</h1>
                    <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                        <ul class="breadcrumb pt-0">
                            <li class="breadcrumb-item"><a href="Dashboards.Default.html">Home</a></li>
                            <li class="breadcrumb-item"><a href="Interface.html">Niveaux</a></li>
                            <li class="breadcrumb-item"><a href="Interface.Plugins.html">Liste</a>
                            </li>
                            {{-- <li class="breadcrumb-item"><a href="Interface.Plugins.Datatables.html">Datatables</a></li> --}}
                        </ul>
                    </nav>
                </div>
                <div class="col-12 col-md-5 d-flex align-items-start justify-content-end">
                    <button type="button" class="btn btn-outline-primary btn-icon btn-icon-start w-100 w-md-auto add-datatable">
                        <i data-acorn-icon="plus"></i>
                        <a href="{{url('niveaux/create')}}">
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
                        <th scope="col">Nom</th>
                        <th scope="col">Cycles</th>

                        <th scope="col">Action</th>

                    </tr>
                </thead>

                <tbody>
                    @foreach ($niveaux as $niveau)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $niveau->nom }}</td>
                        <td>{{ $niveau->cycle}}</td>

                        <td>

                            <form method="POST" action="{{ url('/niveaux/' . $niveau->id)}}">
                                {{method_field('DELETE')}}
                                @csrf
                                <a href="{{url('niveaux/' .$niveau->id)}}">
                                    <button class="btn btn-info mb-1" type="button"><i class="fa fa-eye"></i></button>
                                </a>
                                <a href="{{url('niveaux/' .$niveau->id. '/edit')}}">
                                    <button type="button" class="btn btn-secondary mb-1"> <i class="fa fa-pencil-square-o"></i> </button>
                                </a> <button class="btn btn-icon btn-icon-end btn-danger mb-1" type="submit">
                                    {{-- <span>Delete</span> --}}
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $niveaux->links() !!}
        </div>
    </div>
</section>
@endsection

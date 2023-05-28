@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col">
        <div class="page-title-container">
            <div class="row">
                <div class="col-12 col-md-7">
                    <h1 class="mb-0 pb-0 display-4" id="title">Liste des filieres</h1>
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
                        <a href="{{url('filieres/create')}}">
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
                        <th scope="col">NOM</th>
                        <th scope="col">Departement</th>
                        <th scope="col">Faculter</th>
                        <th scope="col">Action</th>

                    </tr>
                </thead>

                <tbody>
                    @foreach ($filieres as $filier)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $filier->nom }}</td>
                        <td>{{ $filier->departement}}</td>
                        <td>{{ $filier->faculter}}</td>

                        <td>

                           <form method="POST" action="{{ url('/filieres/delete' . $filier->id)}}">
                                {{method_field('DELETE')}}
                                @csrf
                                <button type="submit" class="btn btn-icon btn-icon-end btn-danger mb-1"> <i class="fa fa-trash"></i></button>
                           
                             <a href="{{url('filieres/' .$filier->id)}}">
                                <button class="btn btn-info mb-1" type="button"> <i class="fa fa-eye"></i></button>
                            </a>

                            <a href="{{url('filieres/' .$filier->id. '/edit')}}">
                                <button type="button" class="btn btn-secondary mb-1"><i class="fa fa-pencil-square-o"></i></button>
                            </a>
                           
                            </form> 

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $filieres->links() !!}
        </div>
    </div>
</section>
@endsection

@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col">
        <div class="page-title-container">
            <div class="row">
                <div class="col-12 col-md-7">
                    <h1 class="mb-0 pb-0 display-4" id="title">FORMULAIRE D'AJOUT DE LA FILIERE</h1>
                </div>
            </div>
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif

<div class="card mb-5">
    <div class="card-body">
        <form method="POST" action="{{ url('filieres') }}" id="validationTopLabel" class="tooltip-end-top" novalidate="novalidate">
            @csrf

            @include('filieres.form')

            <button class="btn btn-primary" type="submit">
                Ajouter
            </button>
        </form>
    </div>
</div>
</div>
</div>
</div> 


@endsection

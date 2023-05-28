@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col">
        <div class="page-title-container">
            <div class="row">
                <div class="col-12 col-md-7">
                    <h1 class="mb-0 pb-0 display-4" id="title">FORMULAIRE DE MODIFICATION DU NIVEAUX</h1>
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
                    <form method="POST" action="{{ url('niveaux/' . $niveaux->id) }}" id="validationTopLabel" class="tooltip-end-top" novalidate="novalidate">
                     {{method_field('PATCH')}}
                        @csrf

                        <label class="mb-3 top-label">
                            <input class="form-control" type="text" name="nom" required="">
                            <span>Nom</span>
                        </label>

                        <select class="form-select" id="specificSizeSelect" name="cycle">
                            <option selected="selected">Selectionner le cycle</option>
                            <option value="BTS">BTS</option>
                            <option value="LICENCE">LICENCE</option>
                            <option value="LICENCE_PRO">LICENCE_PRO</option>
                            <option value="MASTER">MASTER</option>
                            <option value="MASTER_PRO">MASTER_PRO</option>
                            <option value="DOCTORAT">DOCTORAT</option>
                        </select> <br>

                        <button class="btn btn-primary" type="submit">
                            modifier
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

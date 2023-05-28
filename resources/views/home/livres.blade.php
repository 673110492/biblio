@extends('layouts.app-home')
@section('content')
<div class="row">
    <div class="col">
        <section class="scroll-section" id="title">
            <div class="page-title-container">
                <h1 class="mb-0 pb-0 display-4">Card</h1>
                <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                    <ul class="breadcrumb pt-0">
                        <li class="breadcrumb-item"><a href="Dashboards.Default.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="Interface.html">Interface</a></li>
                        <li class="breadcrumb-item"><a href="Interface.Components.html">Components</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </section>
        <div>
            <div class="card mb-5">
                <div class="card-body">
                    <p class="mb-0">
                        Bootstrap’s cards provide a flexible and extensible content container with
                        multiple variants and options. We have extended them to create cards for icons,
                        videos, products and so on.
                    </p>
                </div>
            </div>
            <section class="scroll-section" id="images">
                <h2 class="small-title">Images</h2>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-xl-4 g-4">
                    @foreach($livres as $livre)
                        <div class="col">
                            <div class="card h-100">
                                <img src="{{$livre->image}}" class="card-img-top" alt="image" _mstalt="60073">
                                <div class="card-body">
                                    <h5 class="card-title">{{$livre->titre}}</h5>
                                    <p class="card-text">
                                        {{$livre->description}}
                                    </p>
                                      <button class="btn btn-info mb-1" type="button"> <i class="fa fa-eye"></i></button>
                                    <button type="button" class="btn btn-secondary mb-1"> <i class="fa fa-download" aria-hidden="true"></i> </button> 

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>

        </div>
    </div>

</div>
@endsection

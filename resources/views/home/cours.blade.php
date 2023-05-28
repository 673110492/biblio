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
                    @foreach($cours as $cour)
                    <script>
                        
                    </script>
                        <div class="col">
                            <div class="card h-100">
                                <canvas id="pdf-canvas" width="400"></canvas>
                                {{-- <img src="{{$cour->fichier}}" class="card-img-top" alt="image" _mstalt="60073"> --}}
                                <div class="card-body">
                                    <h5 class="card-title">{{$cour->titre}}</h5>
                                    <p class="card-text">
                                        {{$cour->description}}
                                    </p>

                                    <button class="btn btn-info mb-1" type="button"> <i class="fa fa-eye"></i></button>
                                    <a href="{{ $cour->fichier }}">
                                    <button type="button" class="btn btn-secondary mb-1"> <i class="fa fa-download" aria-hidden="true"></i> </button> 
                                    </a>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>

        </div>
    </div>

</div>
<script>

var _PDF_DOC,
    _CURRENT_PAGE,
    _TOTAL_PAGES,
    _PAGE_RENDERING_IN_PROGRESS = 0,
    _CANVAS = document.querySelector('#pdf-canvas');

// initialize and load the PDF
async function showPDF(pdf_url) {

    // get handle of pdf document
    try {
        _PDF_DOC = await pdfjsLib.getDocument({ url: pdf_url });
    }
    catch(error) {
        alert(error.message);
    }

    // total pages in pdf
    _TOTAL_PAGES = _PDF_DOC.numPages;
    

    // show the first page
    showPage(1);
}

// load and render specific page of the PDF
async function showPage(page_no) {
    _PAGE_RENDERING_IN_PROGRESS = 1;
    _CURRENT_PAGE = page_no;


    // while page is being rendered hide the canvas and show a loading message
    //document.querySelector("#pdf-canvas").style.display = 'none';

    
    // get handle of page
    try {
        var page = await _PDF_DOC.getPage(page_no);
    }
    catch(error) {
        alert(error.message);
    }

    // original width of the pdf page at scale 1
    var pdf_original_width = page.getViewport(1).width;
    
    // as the canvas is of a fixed width we need to adjust the scale of the viewport where page is rendered
    var scale_required = _CANVAS.width / pdf_original_width;

    // get viewport to render the page at required scale
    var viewport = page.getViewport(scale_required);

    // set canvas height same as viewport height
    _CANVAS.height = viewport.height;

    

    // page is rendered on <canvas> element
    var render_context = {
        canvasContext: _CANVAS.getContext('2d'),
        viewport: viewport
    };
        
    // render the page contents in the canvas
    try {
        await page.render(render_context);
    }
    catch(error) {
        alert(error.message);
    }

    _PAGE_RENDERING_IN_PROGRESS = 0;

    // show the canvas and hide the page loader
    //document.querySelector("#pdf-canvas").style.display = 'block';
}


    showPDF('https://mozilla.github.io/pdf.js/web/compressed.tracemonkey-pldi-09.pdf');



</script>
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.2.228/pdf.min.js"></script>

@endsection

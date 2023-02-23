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
                        <button type="button"
                            class="btn btn-outline-primary btn-icon btn-icon-start w-100 w-md-auto add-datatable">
                            <i data-acorn-icon="plus"></i>
                            <span>Add New</span>
                        </button>

                    </div>
                </div>
            </div>

            <section class="scroll-section" id="basic">
                <h2 class="small-title">Basic</h2>
                <div class="card mb-5">
                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <label class="form-label">Email address</label>
                                <input type="email" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tag</label>
                                <tags class="tagify form-control tagify--noTags tagify--empty" tabindex="-1">
                                    <span contenteditable="" data-placeholder="​" aria-placeholder="" class="tagify__input"
                                        role="textbox" aria-autocomplete="both" aria-multiline="false"></span>
                                </tags><input class="form-control" id="tagBasic">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Date</label>
                                <input type="text" class="form-control date-picker" id="datePickerBasic">
                            </div>
                            <div class="mb-3 w-100">
                                <label class="form-label">Breads</label>
                                <select id="selectBasic" data-select2-id="selectBasic" tabindex="-1"
                                    class="select2-hidden-accessible" aria-hidden="true">
                                    <option label="&nbsp;" data-select2-id="2"></option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                    <option value="Maybe">Maybe</option>
                                </select><span class="select2 select2-container select2-container--bootstrap4"
                                    dir="ltr" data-select2-id="1" style="width: 67px;"><span class="selection"><span
                                            class="select2-selection select2-selection--single" role="combobox"
                                            aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false"
                                            aria-labelledby="select2-selectBasic-container"><span
                                                class="select2-selection__rendered" id="select2-selectBasic-container"
                                                role="textbox" aria-readonly="true"><span
                                                    class="select2-selection__placeholder"></span></span><span
                                                class="select2-selection__arrow" role="presentation"><b
                                                    role="presentation"></b></span></span></span><span
                                        class="dropdown-wrapper" aria-hidden="true"></span></span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Address</label>
                                <textarea placeholder="" class="form-control" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </section>

        </div>
    @endsection

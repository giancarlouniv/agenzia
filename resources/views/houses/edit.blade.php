@extends('layouts.page')
@section('title','Dettaglio Immobile')
@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                   @include('houses.partials.customercard')
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Dati Immobile</a></li>
                                <li class="nav-item"><a class="nav-link" href="#images" data-toggle="tab">Immagini e Planimetria</a></li>
                                <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Attività</a></li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                @include('houses.partials.setting')
                                @include('houses.partials.photo')
                                @include('houses.partials.activity')
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col-9 -->

            </div>
        </div>
    </section>
@endsection

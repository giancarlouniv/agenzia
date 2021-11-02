@extends('layouts.page')
@section('title','Modifica Collaborazione')
@section('content')
    <div class="container mb-2">
        @if (count($errors) > 0)
            <div class="alert bg-danger mb-2" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>

        @endif
        <div class="row">
            <div class="col-md-6">
                <h2>Modifica Collaborazione {{$collaboration->name}}</h2>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        {!! Form::model($collaboration, ['method' => 'PATCH','route' => ['collaborations.update', $collaboration->id]]) !!}
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Nome Agenzia:</strong>
                                    {!! Form::text('name', null, array('placeholder' => 'Nome','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Referente:</strong>
                                    {!! Form::text('ref', null, array('placeholder' => 'Nome Referente','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-3 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <strong>Stato Collaborazione:</strong>
                                    <select name="status" class="form-control select2" style="width: 100%" id="">
                                        <option value="SI">SI</option>
                                        <option value="NO">NO</option>
                                        <option value="FORSE">FORSE</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-9 col-sm-9 col-md-9">
                                <div class="form-group">
                                    <strong>Note:</strong>
                                    {!! Form::text('note', null,array('placeholder' => 'Note','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <button type="submit" class="btn btn-primary">Salva</button>
                                <a class="btn btn-secondary" href="{{ route('collaborations.index') }}"> Indietro</a>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection

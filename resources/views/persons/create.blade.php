@extends('layouts.page')
@section('title','Nuovo Nominativo')
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
                <h2>Nuovo Nominativo</h2>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        {!! Form::open(array('route' => 'persons.store','method'=>'POST')) !!}
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Nome:</strong>
                                    {!! Form::text('name', null, array('placeholder' => 'Nome','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Cognome:</strong>
                                    {!! Form::text('surname', null, array('placeholder' => 'Cognome','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Email:</strong>
                                    {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <strong>Telefono:</strong>
                                    {!! Form::text('phone', null,array('placeholder' => 'Telefono','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-8 col-sm-8 col-md-8">
                                <div class="form-group">
                                    <strong>Note Telefono:</strong>
                                    {!! Form::text('note_phone', null,array('placeholder' => 'Note Telefono','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <strong>Altro telefono:</strong>
                                    {!! Form::text('phone2', null,array('placeholder' => 'Altro telefono','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-8 col-sm-8 col-md-8">
                                <div class="form-group">
                                    <strong>Note altro telefono:</strong>
                                    {!! Form::text('note_phone2', null,array('placeholder' => 'Note altro telefono','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <button type="submit" class="btn btn-primary">Salva</button>
                                <a class="btn btn-secondary" href="{{ route('persons.index') }}"> Indietro</a>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection

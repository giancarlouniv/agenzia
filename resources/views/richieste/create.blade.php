@extends('layouts.page')
@section('title','Nuova Richiesta')
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
                <h2>Nuova Richiesta</h2>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        {!! Form::open(array('route' => 'richieste.store','method'=>'POST')) !!}

                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="inputEmail4">Contratto</label>
                                <select name="contract_id" class="select2" style="width: 100%;" id="contract_id">
                                    @foreach($contracts as $contract)
                                        <option value="{{$contract->id}}">
                                            {{$contract->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputPassword4">Tipologia</label>
                                <select name="house_type_id" class="select2" style="width: 100%;" id="house_type_id">
                                    @foreach($house_types as $type)
                                        <option value="{{$type->id}}">
                                            {{$type->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="person_id">Nominativo*</label> <span> (non è presente in anagrafica? <a href="{{url('/persons')}}/create"> + Crea Nominativo</a> )</span>
                                <select name="person_id" class="select2" style="width: 100%;" id="person_id" required>
                                    @foreach($persons as $person)
                                        <option value="{{$person->id}}">
                                            {{$person->surname . ' ' . $person->name}} - {{$person->phone}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="">Vani*</label>
                                <input type="number" class="form-control" name="vani" id="vani" required>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="">Mutuo</label>
                                <select name="mutuo" class="select2" style="width: 100%;" id="mutuo">
                                    <option value="Non Comunicato">Non Comunicato</option>
                                    <option value="< 80%">< 80%</option>
                                    <option value="80%">80%</option>
                                    <option value="100%">100%</option>
                                    <option value="No mutuo">No mutuo</option>

                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="">Prezzo Massimo*</label>
                                <input name="max_price" required type="text" class="form-control" id="money" data-inputmask="'thousandsSeparatorSymbol': '.','alias': 'currency', 'placeholder': '€', 'digits': '0', 'allowMinus': 'false'"/>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="">Fonte</label>
                                <select name="source_id" class="select2" style="width: 100%;" id="source_id">
                                    @foreach($sources as $source)
                                        <option value="{{$source->id}}">{{$source->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-9">
                                <label for="">Zone</label>
                                <select name="zone" class="select2" style="width: 100%" multiple id="">
                                    @foreach($zones as $zone)
                                        <option value="{{$zone->id}}">{{$zone->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="">Note</label>
                                <textarea name="note" id="" class="form-control" cols="30" rows="3" style="resize: none"></textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-primary">Salva</button>
                                <a class="btn btn-secondary" href="{{ route('houses.index') }}"> Indietro</a>
                            </div>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("#money").inputmask({ alias : "currency", prefix: ''});
        });
    </script>
@endsection

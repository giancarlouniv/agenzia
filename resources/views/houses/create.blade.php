@extends('layouts.page')
@section('title','Nuovo Immobile')
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
                <h2>Nuovo Immobile</h2>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        {!! Form::open(array('route' => 'houses.store','method'=>'POST')) !!}
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
                                <label for="customer_id">Nominativo*</label> <span> (non è presente in anagrafica? <a href="{{url('/persons')}}/create"> + Crea Nominativo</a> )</span>
                                <select name="person_id" class="select2" style="width: 100%;" id="person_id">
                                    @foreach($persons as $person)
                                        <option value="{{$person->id}}">
                                            {{$person->surname . ' ' . $person->name}} - {{$person->phone}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="">Città*</label>
                                <input type="text" class="form-control" name="city" id="city" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputAddress">Indirizzo*</label>
                                <input type="text" class="form-control" id="address" name="address" placeholder="Via/Piazza" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="">Piano</label>
                                <select name="piano" class="select2" style="width: 100%;" id="piano">
                                    <option value="0">Piano Terra</option>
                                    @for($i=1; $i<9; $i++)
                                        <option value="{{$i}}">{{$i}}° piano</option>
                                    @endfor
                                    <option value="9">Oltre 8° piano</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="">Vani*</label>
                                <input type="number" class="form-control" name="vani" id="vani" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="">Mq*</label>
                                <input name="mq" type="text" class="form-control" id="mq" placeholder="" required>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="">Ascensore</label>
                                <select name="is_ascensore" class="select2" style="width: 100%;" id="is_ascensore">
                                    <option value="1">SI</option>
                                    <option value="0">NO</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="">Prezzo*</label>
                                <input name="prezzo" required type="text" class="form-control" id="money" data-inputmask="'thousandsSeparatorSymbol': '.','alias': 'currency', 'placeholder': '€', 'digits': '0', 'allowMinus': 'false'"
                                /><br>
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

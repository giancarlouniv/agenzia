@extends('layouts.page')
@section('title','Immobili')
@section('content')
    <div class="container-fluid mb-2">
        <div class="row">
            <div class="col-md-6">
                <h2>Gestione Immobili</h2>
            </div>
            <div class="col-md-6 text-right">
                    <a class="btn btn-success" href="{{ route('houses.create') }}">Nuovo Immobile</a>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Lista Immobili della piattaforma</h3>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <small class="card-body table-responsive p-2">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Nominativo</th>
                                    <th>Contratto</th>
                                    <th>Tipologia</th>
                                    <th>Indirizzo</th>
                                    <th>Mq</th>
                                    <th>Vani</th>
                                    <th>Prezzo</th>
                                    <th>&nbsp;</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($houses as $house)
                                    <tr>
                                        <td style="white-space: nowrap">
                                            @foreach($house->persons as $person)
                                                {{$person->name[0]}}. {{$person->surname}} <br>
                                            @endforeach
                                        </td>
                                        <td style="white-space: nowrap">
                                                {{$house->contract->name}}
                                        </td>
                                        <td style="white-space: nowrap">{{$house->houseType->name}}</td>
                                        <td style="white-space: nowrap"><b>{{$house->address}}</b> ({{ucfirst($house->city)}})</td>
                                        <td style="white-space: nowrap">{{$house->mq}} mq</td>
                                        <td style="white-space: nowrap">{{$house->vani}}</td>
                                        <td style="white-space: nowrap">€ {{number_format($house->prezzo, 2, ',', '.')}}</td>
                                        <td style="white-space: nowrap">
                                                <a href="{{url('/houses')}}/{{$house->id}}/edit" class="btn btn-secondary btn-sm"><i class="fas fa-edit"></i></a>
                                                {!! Form::open(['method' => 'DELETE','route' => ['houses.destroy', $house->id],'style'=>'display:inline', 'id' => 'form_'.$house->id]) !!}
                                                {{ Form::button('<i class="far fa-trash-alt" aria-hidden="true"></i>', ['class' => 'btn btn-danger btn-sm', 'type' => 'button', 'onclick' => "faiqualcosa(".$house->id.")"]) }}
                                                {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <span id="link">{!! $houses->links('pagination::bootstrap-4') !!}</span>
    </div>

    <style>
        .centerRound{
            width: 40px;
            height: 40px;
            border-radius: 50%;
            color: white;
            background-color: #037BFE;
            padding: 0px;
            text-align: center;
            vertical-align: middle;
            display: table-cell;
        }

        .centerRoundGreen{
            width: 40px;
            height: 40px;
            border-radius: 50%;
            color: white;
            background-color: #087f0e;
            padding: 0px;
            text-align: center;
            vertical-align: middle;
            display: table-cell;
        }
    </style>

    <script>
        function faiqualcosa(id){
            if(!confirm('Sicuro di voler eliminare questo immobile?')){
                $("#form_"+id).submit(function(e){
                    e.preventDefault();
                });
            } else {
                $("#form_"+id).unbind('submit').submit()
            }
        }
    </script>

    {{-- <script>
         const Search = (value) => {
             console.log(value)
         }
     </script>--}}

@endsection

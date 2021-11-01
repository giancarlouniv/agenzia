@extends('layouts.page')
@section('title','Richieste')
@section('content')
    <div class="container-fluid mb-2">
        <div class="row">
            <div class="col-md-6">
                <h2>Gestione Richieste</h2>
            </div>
            <div class="col-md-6 text-right">
                <a class="btn btn-success" href="{{ route('richieste.create') }}">Nuova Richieste</a>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Lista Richieste della piattaforma</h3>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <div class="card-body table-responsive p-2">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Nominativo</th>
                                    <th>Contratto</th>
                                    <th>Tipologia</th>
                                    <th>Vani</th>
                                    <th>Mutuo</th>
                                    <th>Prezzo</th>
                                    <th>&nbsp;</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($richieste as $richiesta)
                                    <tr>
                                        <td>{{$richiesta->person->name[0]}}. {{$richiesta->person->surname}} </td>
                                        <td>{{$richiesta->contract->name}} </td>
                                        <td>{{$richiesta->house_type->name}} </td>
                                        <td>{{$richiesta->vani}} </td>
                                        <td>{{$richiesta->mutuo}} </td>
                                        <td>{{$richiesta->max_price}} </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" style="text-align: center">
                                            <i>Nessuna richiesta presente</i>
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <span id="link">{!! $richieste->links('pagination::bootstrap-4') !!}</span>
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
            if(!confirm('Sicuro di voler eliminare questa richiesta?')){
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

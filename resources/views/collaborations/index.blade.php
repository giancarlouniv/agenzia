@extends('layouts.page')
@section('title','Agenzie')
@section('content')
    <div class="container-fluid mb-2">
        <div class="row">
            <div class="col-md-6">
                <h2>Gestione Agenzie</h2>
            </div>
            <div class="col-md-6 text-right">
                <a class="btn btn-success" href="{{ route('collaborations.create') }}">Nuova Collaborazione</a>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row d-flex justify-content-between">
                            <div>
                                <h3 class="card-title">Lista Agenzie / Collaborazioni</h3>
                            </div>
                            <div class="form-inline">
                                <div class="form-group mx-sm-8 mb-2">
                                    <input type="text" style="width: 300px!important;" class="form-control mb-2" id="search-box" placeholder="Cerca agenzia, referente...">
                                    <button type="button" class="btn btn-primary mb-2 ml-2" onclick="Search()">Cerca</button>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <div class="card-body table-responsive p-2">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Agenzia</th>
                                    <th>Collaborazione</th>
                                    <th>Referente</th>
                                    <th>Note</th>
                                    <th>&nbsp;</th>
                                </tr>
                                </thead>
                                <tbody id="result">
                                @forelse($collaborators as $collaborator)
                                    <tr>
                                        <td>{{$collaborator->name}}</td>
                                        <td>{{$collaborator->status}}</td>
                                        <td>{{$collaborator->ref}}</td>
                                        <td>{{$collaborator->note}}</td>
                                        <td><a href="{{env('APP_URL')}}collaborations/{{$collaborator->id}}/edit" class="btn btn-secondary">Edit</a></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" style="text-align: center">
                                            <i>Nessuna agenzia presente</i>
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
        <span id="link">{!! $collaborators->links('pagination::bootstrap-4') !!}</span>
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
            if(!confirm('Sicuro di voler eliminare questa agenzia?')){
                $("#form_"+id).submit(function(e){
                    e.preventDefault();
                });
            } else {
                $("#form_"+id).unbind('submit').submit()
            }
        }

        const Search = () => {
            let text = document.getElementById('search-box').value;
            let resultDiv = document.getElementById('result');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                jQuery.ajax({
                    url: "{{env('APP_URL')}}collaboration/search",
                    method: 'post',
                    datatype: 'json',
                    data: { search: text},
                    success: function(response){
                        resultDiv.innerHTML = response;
                    },
                    error: function(error){
                        console.log(error);
                    }
                });
        }
    </script>

@endsection

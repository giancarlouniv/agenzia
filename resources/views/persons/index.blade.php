@extends('layouts.page')
@section('title','Nominativi')
@section('content')
    <div class="container-fluid mb-2">
        <div class="row">
            <div class="col-md-6">
                <h2>Gestione Nominativi</h2>
            </div>
            <div class="col-md-6 text-right">
                <a class="btn btn-success" href="{{ route('persons.create') }}">Nuovo Nominativo</a>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6"><h3 class="card-title">Lista Nominativi della piattaforma</h3></div>
                            <div class="col-6 d-flex justify-content-end">
                                <input type="text" id="search-input" class="form-control" placeholder="Cerca per nome, cognome, email, telefono, note..">
                                <button class="btn btn-primary ml-1" onclick="Search()">Cerca</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <div class="card-body table-responsive p-2">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Cognome e Nome</th>
                                    <th>Email</th>
                                    <th>Telefono</th>
                                    <th>Data Registrazione</th>
                                    <th>&nbsp;</th>
                                </tr>
                                </thead>
                                <tbody id="result">
                                @forelse($persons as $person)
                                    <tr>
                                        <td>{{$person->surname}} {{$person->name}}</td>
                                        <td>{{$person->email}}</td>
                                        <td>{{$person->phone}}</td>
                                        <td>{{date('d/m/Y',strtotime($person->created_at))}}</td>
                                        <td>
                                                <a href="{{url('/persons')}}/{{$person->id}}/edit" class="btn btn-secondary">Edit</a>
                                                {!! Form::open(['method' => 'DELETE','route' => ['persons.destroy', $person->id],'style'=>'display:inline']) !!}
                                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                                {!! Form::close() !!}
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" style="text-align: center">
                                                <i>Nessun nominativo presente</i>
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
        <span id="link">{!! $persons->links('pagination::bootstrap-4') !!}</span>
    </div>
    <script>
        function Search()
        {
            let value = document.getElementById('search-input').value;
            let resultDiv = document.getElementById('result');
            if(value != ' '){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                jQuery.ajax({
                    url: "{{url('persons')}}/search/",
                    method: 'post',
                    datatype: 'json',
                    data: { search: value},
                    success: function(response){
                        resultDiv.innerHTML = response;
                    },
                    error: function(error){
                        console.log(error);
                    }
                });
            }
        }
    </script>
@endsection

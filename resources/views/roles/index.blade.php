@extends('layouts.page')
@section('title','Ruoli')
@section('content')
    <div class="container-fluid mb-2">
        <div class="row">
            <div class="col-md-6">
                <h2>Gestione Ruoli</h2>
            </div>
            <div class="col-md-6 text-right">
                    <a class="btn btn-success" href="{{ route('roles.create') }}">Nuovo Ruolo</a>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Lista Ruoli della piattaforma</h3>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <div class="card-body table-responsive p-2">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nome ruolo</th>
                                    <th>&nbsp;</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($roles as $role)
                                    <tr>
                                        <td style="width: 10%">#{{$role->id}}</td>
                                        <td style="width: 25%">{{$role->name}}</td>
                                        <td class="text-right">
                                                <a href="{{url('/roles')}}/{{$role->id}}/edit" class="btn btn-secondary">Edit</a>
                                                {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
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
        <span id="link">{!! $roles->links('pagination::bootstrap-4') !!}</span>
    </div>
@endsection


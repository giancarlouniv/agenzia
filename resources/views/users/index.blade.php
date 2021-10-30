@extends('layouts.page')
@section('title','Utenti')
@section('content')
    <div class="container-fluid mb-2">
        <div class="row">
            <div class="col-md-6">
                <h2>Gestione Utenti</h2>
            </div>
            <div class="col-md-6 text-right">
                <a class="btn btn-success" href="{{ route('users.create') }}">Nuovo Utente</a>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Lista Utenti della piattaforma</h3>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <div class="card-body table-responsive p-2">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Ruolo</th>
                                    <th>Data Registrazione</th>
                                    <th>&nbsp;</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>#{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                            @if( $user->roles->pluck('id')[0] == '1')
                                                <span class="badge badge-primary">{{ $user->roles->pluck('name')[0] }}</span>
                                            @else
                                                <span class="badge badge-secondary">{{ $user->roles->pluck('name')[0] }}</span>
                                            @endif

                                        </td>
                                        <td>{{date('d/m/Y',strtotime($user->created_at))}}</td>
                                        <td>
                                                <a href="{{url('/users')}}/{{$user->id}}/edit" class="btn btn-secondary">Edit</a>
                                                {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
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
        <span id="link">{!! $users->links('pagination::bootstrap-4') !!}</span>
    </div>
@endsection

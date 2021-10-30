@extends('layouts.page')
@section('title','Permessi')
@section('content')
    <div class="container-fluid mb-2">
        <div class="row">
            <div class="col-md-6">
                <h2>Gestione Permessi</h2>
            </div>
            @if(Auth::user()->id === 1)
                <div class="col-md-6 text-right">
                    <a class="btn btn-success" href="{{ route('permissions.create') }}">Nuovo Permesso</a>
                </div>
            @endif
        </div>
    </div>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Lista Permessi della piattaforma</h3>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <div class="card-body table-responsive p-2">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nome</th>
                                    <th>&nbsp;</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($permissions as $permission)
                                    <tr>
                                        <td style="width: 10%">#{{$permission->id}}</td>
                                        <td style="width: 25%">{{$permission->name}}</td>
                                        <td class="text-right">
                                            <a href="{{url('/permissions')}}/{{$permission->id}}/edit" class="btn btn-secondary">Edit</a>
                                            @if(Auth::user()->id === 1)
                                                {!! Form::open(['method' => 'DELETE','route' => ['permissions.destroy', $permission->id],'style'=>'display:inline']) !!}
                                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                                {!! Form::close() !!}
                                            @endif
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
        <span id="link">{!! $permissions->links('pagination::bootstrap-4') !!}</span>
    </div>
@endsection


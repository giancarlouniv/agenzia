@foreach($persons as $person)
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
@endforeach

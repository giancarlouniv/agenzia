@forelse($collaborations as $collaborator)
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

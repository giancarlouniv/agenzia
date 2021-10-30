<!-- About Customer -->
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">
            {{--{{$house->customers->first()->surname}} {{$house->customers->first()->name}}--}}
        </h3>
    </div>
    <div class="card-body">
        <strong><i class="fas fa-book mr-1"></i>Tipologia</strong>

        <p class="text-muted">
            {{--{{$house->customers->first()->type->name}}--}}
        </p>

        <hr>

        <strong><i class="fas fa-map-marker-alt mr-1"></i>Dati Cliente</strong>

        <p class="text-muted">
            {{--Compleanno: {{date('d/m/Y',strtotime($house->customers->first()->data_birthday))}} <br>
            {{$house->customers->first()->email}} <br>
            {{$house->customers->first()->phone}} <br>
            {{$house->customers->first()->phone2}}--}}
        </p>

        <hr>

        <strong><i class="fas fa-calendar-alt mr-1"></i>Registrazione</strong>

        <p class="text-muted">
            <span class="tag tag-danger">
                {{--{{date('d/m/Y',strtotime($house->customers->first()->created_at))}}--}}
            </span>
        </p>

        <hr>

        <strong><i class="fas fa-calendar-alt mr-1"></i>Data Atto </strong>

        <p class="text-muted">
            <span class="tag tag-danger">
                {{--{{date('d/m/Y',strtotime($house->customers->first()->created_at))}}--}}
            </span>
        </p>

        <hr>

        <strong><i class="far fa-file-alt mr-1"></i> Note</strong>

        <p class="text-muted">
            {{--{{$house->customers->first()->note}}--}}
        </p>
    </div>
</div>
{{--<a href="{{url('/')}}/customers/{{$house->customers->first()->id}}/edit" class="btn btn-primary btn-block"><b>Vedi scheda cliente</b></a>--}}
<!-- /.About User -->

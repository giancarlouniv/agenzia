<div class="tab-pane active" id="settings">
    {!! Form::model($house, ['method' => 'PATCH','route' => ['houses.update', $house->id]]) !!}
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Contratto</label>
            <div class="col-sm-10">
                <select name="contract_id" class="form-control" id="">
                    @foreach($contracts as $contract)
                        <option value="{{$contract->id}}" @if($house->contract_id == $contract->id) selected @endif>{{$contract->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Tipologia</label>
            <div class="col-sm-10">
                <select name="house_type_id" class="form-control" id="">
                    @foreach($house_types as $house_type)
                        <option value="{{$house_type->id}}" @if($house->house_type_id == $house_type->id) selected @endif>{{$house_type->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Nominativo</label>
            <div class="col-sm-10">
                <select name="person_id" class="select2" style="width: 100%;" id="person_id">
                   @foreach($persons as $person)
                        <option value="{{$person->id}}" @if($person->id == $house->person->id) selected @endif>
                            {{$person->surname . ' ' . $person->name}} ({{$person->phone}}) </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Città*</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="city" id="city" value="{{$house->city}}" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Indirizzo*</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="address" name="address" value="{{$house->address}}" placeholder="Via/Piazza" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Piano</label>
            <div class="col-sm-10">
                <select name="piano" class="select2" style="width: 100%;" id="piano">
                    <option value="0">Piano Terra</option>
                    @for($i=1; $i<9; $i++)
                        <option value="{{$i}}" @if($i == $house->piano) selected @endif>{{$i}}° piano</option>
                    @endfor
                    <option value="9">Oltre 8° piano</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Vani*</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="vani" name="vani" value="{{$house->vani}}" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Mq*</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="mq" name="mq" value="{{$house->mq}}"  required>
            </div>
        </div>

        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Ascensore</label>
            <div class="col-sm-10">
                <select name="is_ascensore" class="select2" style="width: 100%;" id="is_ascensore">
                    <option value="1" @if($house->is_ascensore == 1) selected @endif >SI</option>
                    <option value="0" @if($house->is_ascensore == 0) selected @endif >NO</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Prezzo*</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="prezzo" name="prezzo" value="{{$house->prezzo}}"  required>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Link</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="link" name="link" value="{{$house->link}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Note</label>
            <div class="col-sm-10">
                <textarea name="note" id="" cols="30" rows="5" class="form-control">{{$house->note}}</textarea>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-12 text-right">
                <button type="submit" class="btn btn-danger">Aggiorna dati</button>
            </div>
        </div>
    {!! Form::close() !!}
</div>
<!-- /.tab-pane -->

<div class="mt-2 row">
    <div class="col-2">
        <label for="type_id" class="fw-bold text-capitalize">@lang('type') : </label>
    </div>
    <div class="col">
        <select id="type_id" name="type_id" class="form-select">
            @foreach($types as $type)
                <option value="{{$type['id']}}" @if(old('type_id') == $type['id']) selected @elseif(isset($data['type']) && $data['type']['id'] == $type['id']) selected @endif>{{$type['name']}}</option>
            @endforeach
        </select>
    </div>
</div>

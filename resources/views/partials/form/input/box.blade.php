<div class="mt-2 row">
    <div class="col-2">
        <label for="box_id" class="fw-bold text-capitalize">@lang('box') : </label>
    </div>
    <div class="col">
        <select id="box_id" name="box_id" class="form-select">
            @foreach($boxes as $box)
                <option value="{{$box['id']}}" @if(old('box_id') == $box['id']) selected @elseif(isset($data['box']) && $data['box']['id'] == $box['id']) selected @endif>{{$box['name']}}</option>
            @endforeach
        </select>
    </div>
</div>

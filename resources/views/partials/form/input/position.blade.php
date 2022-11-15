<div class="mt-2 row">
    <div class="col-md-4 col-lg-2">
        <label for="position_id" class="fw-bold text-capitalize">@lang('position') : </label>
    </div>
    <div class="col-md-8 col-lg-10">
        <select id="position_id" name="position_id" class="form-select">
            @foreach($positions as $position)
                <option value="{{$position['id']}}" @if(old('position_id') == $position['id']) selected @elseif(isset($data['position']) && $data['position']['id'] == $position['id']) selected @endif>{{$position['zone']['name']}} - @lang('position') {{$position['name']}}</option>
            @endforeach
        </select>
    </div>
</div>

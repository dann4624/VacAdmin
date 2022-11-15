<div class="mt-2 row">
    <div class="col-md-4 col-lg-2">
        <label for="zone_id" class="fw-bold text-capitalize">@lang('zone') : </label>
    </div>
    <div class="col-md-8 col-lg-10">
        <select id="zone_id" name="zone_id" class="form-select">
            @foreach($zones as $zone)
                <option value="{{$zone['id']}}" @if(old('zone_id') == $zone['id']) selected @elseif(isset($data['zone']) && $data['zone']['id'] == $zone['id']) selected @endif>{{$zone['name']}}</option>
            @endforeach
        </select>
    </div>
</div>

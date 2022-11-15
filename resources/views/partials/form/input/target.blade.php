<div class="mt-2 row">
    <div class="col-md-4 col-lg-2">
        <label for="target_id" class="fw-bold text-capitalize">@lang('target') : </label>
    </div>
    <div class="col-md-8 col-lg-10">
        <select id="target_id" name="target_id" class="form-select">
            @foreach($targets as $target)
                <option value="{{$target['id']}}" @if(old('role_id') == $target['id']) selected @elseif(isset($data['target']) && $data['target']['id'] == $target['id']) selected @endif>{{$target['name']}}</option>
            @endforeach
        </select>
    </div>
</div>

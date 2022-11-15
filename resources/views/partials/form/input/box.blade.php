<div class="mt-2 row">
    <div class="col-md-4 col-lg-2">
        <label for="box_id" class="fw-bold text-capitalize">@lang('box') : </label>
    </div>
    <div class="col-md-8 col-lg-10">
        <select id="box_id" name="box_id" class="form-select">
            @foreach($boxes as $box)
                <option value="{{$box['id']}}" @if(old('box_id') == $box['id']) selected @elseif(isset($data['box']) && $data['box']['id'] == $box['id']) selected @endif>{{$box['name']}}</option>
            @endforeach
        </select>
    </div>
</div>

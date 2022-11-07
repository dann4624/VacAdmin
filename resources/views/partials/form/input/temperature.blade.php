<div class="mt-2 row">
    <div class="col-2">
        <label for="temperature" class="fw-bold text-capitalize">@lang('temperature') : </label>
    </div>
    <div class="col">
        <input type="number" name="temperature" id="temperature" class="form-control text-capitalize" value="@if(old('temperature') !== null){{old('temperature')}}@elseif(isset($data['temperature'])){{$data['temperature']}}@endif" placeholder="@lang('temperature')" min="-99999" max="99999" step="0.1">
    </div>
</div>

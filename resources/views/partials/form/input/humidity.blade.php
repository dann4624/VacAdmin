<div class="mt-2 row">
    <div class="col-2">
        <label for="humidity" class="fw-bold text-capitalize">@lang('humidity') : </label>
    </div>
    <div class="col">
        <input type="number" name="humidity" id="humidity" class="form-control text-capitalize" value="@if(old('humidity') !== null){{old('humidity')}}@elseif(isset($data['humidity'])){{$data['humidity']}}@endif" placeholder="@lang('humidity')" min="-99999" max="99999" step="0.1">
    </div>
</div>

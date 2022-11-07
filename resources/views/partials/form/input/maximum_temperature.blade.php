<div class="mt-2 row">
    <div class="col-2">
        <label for="maximum_temperature" class="fw-bold text-capitalize">@lang('maximum') @lang('temperature') : </label>
    </div>
    <div class="col">
        <input type="number" name="maximum_temperature" id="maximum_temperature" class="form-control text-capitalize" value="@if(old('maximum_temperature') !== null){{old('maximum_temperature')}}@elseif(isset($data['maximum_temperature'])){{$data['maximum_temperature']}}@endif" placeholder="@lang('maximum') @lang('temperature')" min="0" max="99999" step="0.1">
    </div>
</div>

<div class="mt-2 row">
    <div class="col-md-4 col-lg-2">
        <label for="minimum_temperature" class="fw-bold text-capitalize">@lang('minimum') @lang('temperature') : </label>
    </div>
    <div class="col-md-8 col-lg-10">
        <input type="number" name="minimum_temperature" id="minimum_temperature" class="form-control text-capitalize" value="@if(old('minimum_temperature') !== null){{old('minimum_temperature')}}@elseif(isset($data['minimum_temperature'])){{$data['minimum_temperature']}}@endif" placeholder="@lang('minimum') @lang('temperature')" min="-99999" max="99999" step="0.1">
    </div>
</div>

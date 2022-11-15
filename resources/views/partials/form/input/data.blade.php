<div class="mt-2 row">
    <div class="col-md-4 col-lg-2">
        <label for="data" class="fw-bold text-capitalize">@lang('data') : </label>
    </div>
    <div class="col-md-8 col-lg-10">
        <input type="text" name="data" id="data" class="form-control text-capitalize" value="@if(old('data') !== null){{old('data')}}@elseif(isset($data['data'])){{$data['data']}}@endif" placeholder="@lang('data')">
    </div>
</div>

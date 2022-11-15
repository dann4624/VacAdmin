<div class="mt-2 row">
    <div class="col-md-4 col-lg-2">
        <label for="batch" class="fw-bold text-capitalize">@lang('batch') : </label>
    </div>
    <div class="col-md-8 col-lg-10">
        <input type="text" name="batch" id="batch" class="form-control text-capitalize" value="@if(old('batch') !== null){{old('batch')}}@elseif(isset($data['batch'])){{$data['batch']}}@endif" placeholder="@lang('batch')">
    </div>
</div>

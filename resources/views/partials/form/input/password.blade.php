<div class="mt-2 row">
    <div class="col-md-4 col-lg-2">
        <label for="password" class="fw-bold text-capitalize">@lang('password') : </label>
    </div>
    <div class="col-md-8 col-lg-10">
        <input type="password" name="password" id="password" class="form-control text-capitalize" value="@if(old('password') !== null){{old('password')}}@elseif(isset($data['password'])){{$data['password']}}@endif" placeholder="@lang('password')">
    </div>
</div>

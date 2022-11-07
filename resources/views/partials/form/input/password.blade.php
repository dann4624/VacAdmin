<div class="mt-2 row">
    <div class="col-2">
        <label for="password" class="fw-bold text-capitalize">@lang('password') : </label>
    </div>
    <div class="col">
        <input type="password" name="password" id="password" class="form-control text-capitalize" value="@if(old('password') !== null){{old('password')}}@elseif(isset($data['password'])){{$data['password']}}@endif" placeholder="@lang('password')">
    </div>
</div>

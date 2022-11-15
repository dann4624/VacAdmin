<div class="mt-2 row">
    <div class="col-md-4 col-lg-2">
        <label for="email" class="fw-bold text-capitalize">@lang('email') : </label>
    </div>
    <div class="col-md-8 col-lg-10">
        <input type="email" name="email" id="email" class="form-control text-capitalize" value="@if(old('email') !== null){{old('email')}}@elseif(isset($data['email'])){{$data['email']}}@endif" placeholder="@lang('email')">
    </div>
</div>

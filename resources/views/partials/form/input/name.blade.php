<div class="mt-2 row">
    <div class="col-2">
        <label for="name" class="fw-bold text-capitalize">@lang('name') : </label>
    </div>
    <div class="col">
        <input type="text" name="name" id="name" class="form-control text-capitalize" value="@if(old('name') !== null){{old('name')}}@elseif(isset($data['name'])){{$data['name']}}@endif" placeholder="@lang('name')">
    </div>
</div>

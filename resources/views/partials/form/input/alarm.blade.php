<div class="mt-2 row">
    <div class="col-md-4 col-lg-2">
        <label for="alarm" class="fw-bold text-capitalize">@lang('alarm') : </label>
    </div>
    <div class="col-md-8 col-lg-10">
        <input type="checkbox" id="alarm" name="alarm" @if(old('alarm') !== null) checked @elseif(isset($data['alarm']) && $data['alarm'] != null) checked @endif>
    </div>
</div>

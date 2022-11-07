<div class="mt-2 row">
    <div class="col-2">
        <label for="email" class="fw-bold text-capitalize">@lang('alarm') : </label>
    </div>
    <div class="col">
        <input type="checkbox" id="alarm" name="alarm" @if(old('alarm') !== null) checked @elseif(isset($data['alarm']) && $data['alarm'] != null) checked @endif>
    </div>
</div>

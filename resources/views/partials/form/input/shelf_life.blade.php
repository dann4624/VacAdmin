<div class="mt-2 row">
    <div class="col-2">
        <label for="shelf_life" class="fw-bold text-capitalize">@lang('shelf_life') : </label>
    </div>
    <div class="col">
        <input type="number" name="shelf_life" id="shelf_life" class="form-control text-capitalize"
               value="@if(old('shelf_life') !== null){{old('shelf_life')}}@elseif(isset($data['shelf_life'])){{$data['shelf_life']}}@endif" placeholder="@lang('shelf_life')" min="0" max="999999">
    </div>
</div>

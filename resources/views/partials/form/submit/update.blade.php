<div class="mt-4 row">
    <div class="col-2">
        @csrf
    </div>
    <div class="col">
        @method('put')
        <button type="submit" class="btn btn-success text-capitalize">@lang('update') @lang($singular)</button>
    </div>
</div>

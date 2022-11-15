<div class="mt-4 row">
    <div class="col-md-4 col-lg-2">
        @csrf
    </div>
    <div class="col-md-8 col-lg-10">
        @method('put')
        <button type="submit" class="btn btn-success text-capitalize">@lang('edit') @lang($singular)</button>
    </div>
</div>

<button data-toggle="modal" data-target="#deleteModal_{{$entity['id']}}" class="btn btn-danger text-capitalize mt-md-2 mt-lg-0">@lang('force') @lang('delete')</button>
<div class="product-edit-buttons">
    <!-- Modal -->
    <div class="modal" tabindex="-1" role="dialog" id="deleteModal_{{$entity['id']}}">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="alert alert-danger" style="display:none"></div>
                <div class="modal-header">
                    <h5 class="modal-title text-capitalize">@lang('force') @lang('delete') @lang($singular)</h5>
                    <button type="button" class="btn btn-secondary close fold" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-capitalize">
                    @lang($singular) : {{ $entity[$name]}}
                </div>
                <div class="modal-footer">
                    <form method="post" action="{{route(Request::segment(1).'.delete_force', ['id' => $entity['id']])}}" id="deleteForm" class="form-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger text-capitalize" id="ajaxSubmit">@lang('force') @lang('delete')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

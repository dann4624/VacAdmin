<form action="{{route(request()->segment(1).".restore",['id' => $entity['id']])}}" method="post" class="d-inline-block mt-md-2 mt-lg-0">
    @csrf
    @method('put')
    <button type="submit" class="btn btn-success text-capitalize">@lang('restore')</button>
</form>

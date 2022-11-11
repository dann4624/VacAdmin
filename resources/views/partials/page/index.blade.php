@section('title')
    Index
@endsection
@section('content')
    @if(in_array(request()->segment(1)."_viewAny_deleted",Session::get('permissions')) OR in_array(request()->segment(1)."_create",Session::get('permissions')) )
        <div class="row mt-2 mb-2">
            <div class="col-11">
                @if(in_array(request()->segment(1)."_viewAny_deleted",Session::get('permissions')))
                    @include('partials.page_inputs.page_selector')
                @endif
            </div>
            <div class="col">
                @if(in_array(request()->segment(1)."_create",Session::get('permissions')))
                    @include('partials.page_inputs.add_button')
                @endif
            </div>
        </div>
    @endif
    @if($data != null && !isset($data['besked']) && count($data) >= 1)
        <table class="table table-striped">
            @include(request()->segment(1).".index_data")
        </table>
    @else
        <span class="text-capitalize">@lang('no_items') @lang($plural)</span>
    @endif

@endsection

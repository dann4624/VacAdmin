@section('title')
    Deleted
@endsection
@section('content')
    <div class="row mt-2 mb-2">
        <div class="col-12">
            @include('partials.page_inputs.page_selector')
        </div>
    </div>
    @if(count($data) >= 1 && !isset($data['besked']))
        <table class="table table-striped">
            @include(request()->segment(1).".deleted_data")
        </table>
    @else
        <span class="text-capitalize">
            @lang('no_items') @lang('deleted_items') @lang($plural)
        </span>

    @endif

@endsection

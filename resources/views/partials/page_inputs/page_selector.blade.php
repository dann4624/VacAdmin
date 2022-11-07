<div class="dropdown flex-right">
    <span class="text-capitalize">@lang('list') : </span>
    <button class="btn btn-secondary dropdown-toggle text-capitalize" type="button" id="Showdropdown" data-bs-toggle="dropdown" aria-expanded="false">
        @lang('select')
    </button>
    <ul class="dropdown-menu" aria-labelledby="Showdropdown">
        @if(Request::is(Request::segment(1)))
            @if(in_array(Request::segment(1)."_viewAny_deleted",Session::get('permissions')))
                <li><a class="dropdown-item text-capitalize" href="{{Request::segment(1)}}/deleted">@lang('deleted')</a></li>
            @endif
        @else
            <li><a class="dropdown-item" href="{{Route(Request::segment(1).".index")}}">@lang('active')</a></li>
        @endif
    </ul>
</div>

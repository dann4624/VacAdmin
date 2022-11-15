<div class="border border-dark px-3 py-2 mb-3" id="topbar">
    <div class="row">
        <div class="col-lg-4 col-md-3">
            <span class="text-capitalize">
                @lang(request()->segment(1))
            </span>
            @if(!empty(request()->segment(2)))
                @if(filter_var(request()->segment(2), FILTER_VALIDATE_INT) !== false)
                    <span class="text-capitalize">
                        : @lang(request()->segment(2))
                    </span>
                @endif
            @endif
        </div>
        <div class="col-lg-6 col-md-5">

        </div>

        <div class="col-lg-2 col-md-4">
            <span class="text-capitalize">
                @lang(request()->segment(1))
            </span>
            @if(!empty(request()->segment(2)))
                @if(filter_var(request()->segment(2), FILTER_VALIDATE_INT) === false)
                    <span class="text-capitalize">
                        / @lang(request()->segment(2))
                    </span>
                @endif
            @endif
            @if(!empty(request()->segment(3)))
                <span class="text-capitalize">
                        / @lang(request()->segment(3))
                </span>
            @endif
        </div>
    </div>
</div>

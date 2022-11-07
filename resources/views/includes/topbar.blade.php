<div class="border border-dark px-3 py-2 mb-3" id="topbar">
    <div class="row">
        <div class="col-4">
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
        <div class="col-6">
            {{now()}} | {{date('d-m-y H:i:s', strtotime(now()))}}
        </div>

        <div class="col">
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

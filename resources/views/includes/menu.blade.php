<nav id="sidebar" class="col-lg-2 col-md-2">
    <header class="mx-3 mt-4 mb-3 fw-bold fs-6 text-center">
        <span>Cool Corona</span>
        <span class="d-md-none d-lg-inline">Admin Panel</span>
    </header>
    <ul class="list-unstyled">
        @if(Session::get('permissions') !== null)

            @if(in_array('types_viewAny',Session::get('permissions')))
                <li class="{{Str::startsWith(Route::currentRouteName(),'types') ? 'active' : '' }}">
                    <a href="{{route('types.index')}}" class="text-capitalize text-md-center text-lg-start">
                        <i class="fa-solid fa-list-check d-md-none d-lg-inline"></i>
                        <span>
                            @lang('types')
                        </span>
                    </a>
                </li>
            @endif

            @if(in_array('roles_viewAny',Session::get('permissions')))
                <li class="{{Str::startsWith(Route::currentRouteName(),'roles') ? 'active' : '' }}">
                    <a href="{{route('roles.index')}}" class="text-capitalize text-md-center text-lg-start">
                        <i class="fa-solid fa-users-between-lines d-md-none d-lg-inline"></i>
                        <span>
                            @lang('roles')
                        </span>
                    </a>
                </li>
            @endif

            @if(in_array('logActions_viewAny',Session::get('permissions')))
                <li class="{{Str::startsWith(Route::currentRouteName(),'logActions') ? 'active' : '' }}">
                    <a href="{{route('logActions.index')}}" class="text-capitalize text-md-center text-lg-start">
                        <i class="fa-solid fa-list d-md-none d-lg-inline"></i>
                        <span>
                            @lang('log')
                            @lang('actions')
                        </span>
                    </a>
                </li>
            @endif

            @if(in_array('targets_viewAny',Session::get('permissions')))
                <li class="{{Str::startsWith(Route::currentRouteName(),'targets') ? 'active' : '' }}">
                    <a href="{{route('targets.index')}}" class="text-capitalize text-md-center text-lg-start">
                        <i class="fa-solid fa-location-crosshairs d-md-none d-lg-inline"></i>
                        <span>
                            API @lang('targets')
                        </span>
                    </a>
                </li>
            @endif

            @if(in_array('tokens_viewAny',Session::get('permissions')))
                <li class="{{Str::startsWith(Route::currentRouteName(),'tokens') ? 'active' : '' }}">
                    <a href="{{route('tokens.index')}}" class="text-capitalize text-md-center text-lg-start">
                        <i class="fa-solid fa-coins d-md-none d-lg-inline"></i>
                        <span>
                            API @lang('tokens')
                        </span>
                    </a>
                </li>
            @endif

            @if(in_array('users_viewAny',Session::get('permissions')))
                <li class="{{Str::startsWith(Route::currentRouteName(),'users') ? 'active' : '' }}">
                    <a href="{{route('users.index')}}" class="text-capitalize text-md-center text-lg-start">
                        <i class="fa-solid fa-user d-md-none d-lg-inline"></i>
                        <span>
                            @lang('users')
                        </span>
                    </a>
                </li>
            @endif

            @if(in_array('logs_viewAny',Session::get('permissions')))
                <li class="{{Str::startsWith(Route::currentRouteName(),'logs') ? 'active' : '' }}">
                    <a href="{{route('logs.index')}}" class="text-capitalize text-md-center text-lg-start">
                        <i class="fa-solid fa-list-ul d-md-none d-lg-inline"></i>
                        <span>
                            @lang('user')
                            @lang('logs')
                        </span>
                    </a>
                </li>
            @endif

            @if(in_array('zones_viewAny',Session::get('permissions')))
                <li class="{{Str::startsWith(Route::currentRouteName(),'zones') ? 'active' : '' }}">
                    <a href="{{route('zones.index')}}" class="text-capitalize text-md-center text-lg-start">
                        <i class="fa-solid fa-map-location-dot d-md-none d-lg-inline"></i>
                        <span>
                            @lang('zones')
                        </span>
                    </a>
                </li>
            @endif

            @if(in_array('zoneLogs_viewAny',Session::get('permissions')))
                <li class="{{Str::startsWith(Route::currentRouteName(),'zoneLogs') ? 'active' : '' }}">
                    <a href="{{route('zoneLogs.index')}}" class="text-capitalize text-md-center text-lg-start">
                        <i class="fa-solid fa-list-ul d-md-none d-lg-inline"></i>
                        <span>
                            @lang('zone')
                            @lang('logs')
                        </span>
                    </a>
                </li>
            @endif

            @if(in_array('positions_viewAny',Session::get('permissions')))
                <li class="{{Str::startsWith(Route::currentRouteName(),'positions') ? 'active' : '' }}">
                    <a href="{{route('positions.index')}}" class="text-capitalize text-md-center text-lg-start">
                        <i class="fa-solid fa-location-dot d-md-none d-lg-inline"></i>
                        <span>
                        @lang('positions')
                    </span>
                    </a>
                </li>
            @endif

            @if(in_array('boxes_viewAny',Session::get('permissions')))
                <li class="{{Str::startsWith(Route::currentRouteName(),'boxes') ? 'active' : '' }}">
                    <a href="{{route('boxes.index')}}" class="text-capitalize text-md-center text-lg-start">
                        <i class="fa-solid fa-box d-md-none d-lg-inline"></i>
                        <span>
                            @lang('boxes')
                        </span>
                    </a>
                </li>
            @endif

            @if(in_array('boxLogs_viewAny',Session::get('permissions')))
                <li class="{{Str::startsWith(Route::currentRouteName(),'boxLogs') ? 'active' : '' }}">
                    <a href="{{route('boxLogs.index')}}" class="text-capitalize text-md-center text-lg-start">
                        <i class="fa-solid fa-list-ul d-md-none d-lg-inline"></i>
                        <span>
                            @lang('box')
                            @lang('logs')
                        </span>
                    </a>
                </li>
            @endif


            <!-- Log Out -->
            @if(Session::get('user') !== null)
                <li class="{{Str::startsWith(Route::currentRouteName(),'logout') ? 'active' : '' }}">
                    <a href="{{route('logout')}}" class="text-capitalize text-md-center text-lg-start bg-danger text-white link-warning">
                        <i class="fa-solid fa-circle-arrow-left d-md-none d-lg-inline"></i>
                        <span>
                            @lang('logout')
                        </span>
                    </a>
                </li>
            @endif
        @else
            <li class="{{Str::startsWith(Route::currentRouteName(),'login') ? 'active' : '' }}">
                <a href="{{route('login.form')}}" class="text-capitalize text-md-center text-lg-start">
                    <i class="fa-solid fa-circle-arrow-right d-md-none d-lg-inline"></i>
                    <span>
                        @lang('login')
                    </span>
                </a>
            </li>
        @endif
    </ul>

</nav>

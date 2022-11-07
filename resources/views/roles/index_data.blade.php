<thead>
    <th class="text-capitalize">@lang('name')</th>
    <th class="text-capitalize text-center">@lang('actions')</th>
    @if(in_array(request()->segment(1)."_edit_permissions",Session::get('permissions')))
        <th class="text-capitalize text-center">@lang('permissions')</th>
    @endif
</thead>
<tbody>
    @foreach($data as $entity)
        <tr>
            <td>
               {{$entity['name']}}
            </td>

            <td class=" text-center">
                @if(in_array(request()->segment(1)."_view",Session::get('permissions')))
                    @include('partials.page_inputs.show_button')
                @endif
                @if(in_array(request()->segment(1)."_edit",Session::get('permissions')))
                    @include('partials.page_inputs.edit_button')
                @endif
                @if(in_array(request()->segment(1)."_delete",Session::get('permissions')))
                    @include('partials.page_inputs.delete_button')
                @endif
            </td>

            @if(in_array(request()->segment(1)."_edit_permissions",Session::get('permissions')))
                <td class=" text-center">
                    <a class="btn btn-success text-capitalize" href="{{Route(Request::segment(1).".permissions.form",['id' => $entity['id']])}}">
                        @lang('edit') @lang('permissions')
                    </a>
                </td>
            @endif
        </tr>
    @endforeach
</tbody>

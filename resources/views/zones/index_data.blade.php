<thead>
    <th class="text-capitalize">@lang('name')</th>
    <th class="text-capitalize text-center">@lang('actions')</th>
    <th class="text-capitalize text-center">@lang('types')</th>
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

            <td class=" text-center">
                @if(in_array(request()->segment(1)."_edit",Session::get('permissions')))
                    <a class="btn btn-success text-capitalize" href="{{Route(Request::segment(1).".types.form",['id' => $entity['id']])}}">
                        @lang('edit') @lang('types')
                    </a>
                @endif
            </td>
        </tr>
    @endforeach
</tbody>

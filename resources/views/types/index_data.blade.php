<thead>
    <th class="text-capitalize">@lang('name')</th>
    <th class="text-capitalize text-center">@lang('shelf_life')</th>
    <th class="text-capitalize text-center">@lang('min') @lang('temperature')</th>
    <th class="text-capitalize text-center">@lang('max') @lang('temperature')</th>
    <th class="text-capitalize text-center">@lang('actions')</th>
</thead>
<tbody>
    @foreach($data as $entity)
        <tr>
            <td>
               {{$entity['name']}}
            </td>
            <td class="text-center">
                {{$entity['shelf_life']}}
            </td>
            <td class="text-center">
                {{$entity['minimum_temperature']}}
            </td>
            <td class="text-center">
                {{$entity['maximum_temperature']}}
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
        </tr>
    @endforeach
</tbody>

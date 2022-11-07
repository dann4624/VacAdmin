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
            @if(in_array(request()->segment(1)."_restore",Session::get('permissions')))
                @include('partials.page_inputs.restore_button')
            @endif
            @if(in_array(request()->segment(1)."_delete_force",Session::get('permissions')))
                @include('partials.page_inputs.force_delete_button')
            @endif
        </td>
    </tr>
@endforeach
</tbody>

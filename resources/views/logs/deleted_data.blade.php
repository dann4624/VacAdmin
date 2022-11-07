<thead>
<th class="text-capitalize">@lang('action')</th>
<th class="text-capitalize">@lang('user')</th>
<th class="text-capitalize">@lang('data')</th>
<th class="text-capitalize text-center">@lang('actions')</th>
</thead>
<tbody>
@foreach($data as $entity)
    <tr>
        <td class="text-capitalize">
            @lang($entity['log_action']['name'])
        </td>
        <td>
            {{$entity['user']['name']}}
        </td>
        <td>
            {{$entity['data']}}
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

<thead>
    <th class="text-capitalize">@lang('zone')</th>
    <th class="text-capitalize">@lang('name')</th>
    <th class="text-capitalize text-center">@lang('actions')</th>
</thead>
<tbody>
@foreach($data as $entity)
    <tr>
        <td>
            <a href="{{route('zones.show',['zone' => $entity['zone']['id']])}}" class="btn btn-outline-success">{{$entity['zone']['name']}}</a>
        </td>
        <td>
            {{$entity['name']}}
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

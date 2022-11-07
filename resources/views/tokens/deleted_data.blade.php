<thead>
<th class="text-capitalize">@lang('target')</th>
<th class="text-capitalize">@lang('role')</th>
<th class="text-capitalize">@lang('token')</th>
<th class="text-capitalize text-center">@lang('actions')</th>
</thead>
<tbody>
@foreach($data as $entity)
    <tr>
        <td >
            <a href="{{route('targets.show',['target' => $entity['target']['id']])}}" class="btn btn-outline-success">{{$entity['target']['name']}}</a>
        </td>
        <td>
            <a href="{{route('roles.show',['role' => $entity['role']['id']])}}"  class="btn btn-outline-success">{{$entity['role']['name']}}</a>
        </td>
        <td style="max-width:15em;">
            <div style="height:3em;overflow:auto;">
                {{$entity['token']}}
            </div>
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

<thead>
    <th class="text-capitalize">@lang('time')</th>
    <th class="text-capitalize text-center">@lang('action')</th>
    <th class="text-capitalize text-center">@lang('zone')</th>
    <th class="text-capitalize text-center">@lang('temperature')</th>
    <th class="text-capitalize text-center">@lang('humidity')</th>
    <th class="text-capitalize text-center">@lang('alarm')</th>
    <th class="text-capitalize text-center">@lang('actions')</th>
</thead>
<tbody>
    @foreach($data as $entity)
        <tr>
            <td>
                {{$entity['created_at']}}
            </td>

            <td class="text-capitalize text-center">
                @lang($entity['log_action']['name'])
            </td>

            <td>
                <a href="{{route('users.show',['user' => $entity['user']['id']])}}" class="btn btn-outline-success">{{$entity['user']['name']}}</a>
            </td>

            <td>
                <a href="{{route('boxes.show',['box' => $entity['box']['id']])}}" class="btn btn-outline-success">{{$entity['box']['name']}}</a>
            </td>

            <td>
                @if(isset($entity['zone']))
                    <a href="{{route('zones.show',['zone' => $entity['zone']['id']])}}" class="btn btn-outline-success">{{$entity['zone']['name']}}</a>
                @endif
            </td>

            <td>
                @if(isset($entity['position']))
                    <a href="{{route('positions.show',['position' => $entity['position']['id']])}}" class="btn btn-outline-success">{{$entity['position']['zone']['name']}} - @lang('position') {{$entity['position']['name']}}</a>
                @endif
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

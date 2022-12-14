<thead>
    <th class="text-capitalize">@lang('time')</th>
    <th class="text-capitalize">@lang('action')</th>
    <th class="text-capitalize ">@lang('user')</th>
    <th class="text-capitalize ">@lang('box')</th>
    <th class="text-capitalize ">@lang('zone')</th>
    <th class="text-capitalize ">@lang('position')</th>
    <th class="text-capitalize text-center">@lang('actions')</th>
</thead>
<tbody>
    @foreach($data as $entity)
        <tr>
            <td>
                {{date('d-m-Y H:i:s',strtotime($entity['created_at']))}}
            </td>


            <td class="col text-capitalize">
                <a href="{{route('logActions.show',['logAction' => $entity['log_action']['name']])}}" class="btn btn-outline-success">@lang($entity['log_action']['name'])</a>
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

<thead>
    <th class="text-capitalize">@lang('time')</th>
    <th class="text-capitalize text-center">@lang('log') @lang('action')</th>
    <th class="text-capitalize text-center">@lang('zone')</th>
    <th class="text-capitalize text-center">@lang('temperature')</th>
    <th class="text-capitalize text-center">@lang('humidity')</th>
    <th class="text-capitalize text-center">@lang('alarm')</th>
    <th class="text-capitalize text-center">@lang('actions')</th>
</thead>
<tbody>
    @foreach($data as $entity)
        <tr class="@if($entity['alarm'] == 1) bg-danger @endif">
            <td>
                {{date('d-m-Y H:i:s',strtotime($entity['created_at']))}}
            </td>

            <td class="text-capitalize text-center">
                <a href="{{route('logActions.show',['logAction' => $entity['log_action']['id']])}}" class="btn btn-outline-success">@lang($entity['log_action']['name'])</a>
            </td>

            <td class="text-center">
                <a href="{{route('zones.show',['zone' => $entity['zone']['id']])}}" class="btn btn-outline-success">{{$entity['zone']['name']}}</a>
            </td>

            <td class="text-center">
                {{$entity['temperature']}}
            </td>

            <td class="text-center">
                {{$entity['humidity']}}
            </td>

            <td class="text-center text-capitalize">
                @if($entity['alarm'] == 1)
                    @lang('true')
                @elseif($entity['alarm'] == 0)
                    @lang('false')
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

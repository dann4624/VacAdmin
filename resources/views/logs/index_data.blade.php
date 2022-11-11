<thead>
    <th class="text-capitalize">@lang('time')</th>
    <th class="text-capitalize">@lang('action')</th>
    <th class="text-capitalize">@lang('user')</th>
    <th class="text-capitalize">@lang('data')</th>
    <th class="text-capitalize text-center">@lang('actions')</th>
</thead>
<tbody>
    @foreach($data as $entity)
        <tr>
            <td>
                {{date('d-m-Y H:i:s',strtotime($entity['created_at']))}}
            </td>
            <td class="text-capitalize">
                @lang($entity['log_action']['name'])
            </td>
            <td>
                <a href="{{route('users.show',['user' => $entity['user']['id']])}}" class="btn btn-outline-success">{{$entity['user']['name']}}</a>
            </td>
            <td>
                {{$entity['data']}}
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

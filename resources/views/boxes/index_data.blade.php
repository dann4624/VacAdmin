<thead>
    <th class="text-capitalize">@lang('type')</th>
    <th class="text-capitalize">@lang('position')</th>
    <th class="text-capitalize">@lang('name')</th>
    <th class="text-capitalize">@lang('batch')</th>
    <th class="text-capitalize">@lang('expires')</th>
    <th class="text-capitalize text-center">@lang('actions')</th>
</thead>
<tbody>
    @foreach($data as $entity)
        <tr>
            <td>
                <a href="{{route('types.show',['type' => $entity['type']['id']])}}" class="btn btn-outline-success">{{$entity['type']['name']}}</a>
            </td>
            <td>
                <a href="{{route('positions.show',['position' => $entity['position']['id']])}}" class="btn btn-outline-success">{{$entity['position']['zone']['name']}} - {{$entity['position']['name']}}</a>
            </td>
            <td>
               {{$entity['name']}}
            </td>
            <td>
                {{$entity['batch']}}
            </td>
            <td>
                {{date('d-m-Y H:i:s',strtotime($entity['expires_at']))}}
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

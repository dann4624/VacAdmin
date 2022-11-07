<thead>
    <th class="text-capitalize">@lang('role')</th>
    <th class="text-capitalize">@lang('name')</th>
    <th class="text-capitalize">@lang('email')</th>
    <th class="text-capitalize text-center">@lang('actions')</th>
</thead>
<tbody>
    @foreach($data as $entity)
        <tr>
            <td>
                <a href="{{route('roles.show',['role' => $entity['role']['id']])}}" class="btn btn-outline-success">{{$entity['role']['name']}}</a>
            </td>
            <td>
               {{$entity['name']}}
            </td>
            <td>
                {{$entity['email']}}
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

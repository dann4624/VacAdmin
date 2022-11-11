<table class="table w-25">
    <tr>
        <td class="col text-capitalize fw-bold">
            @lang('role') :
        </td>
        <td class="col">
            <a href="{{route('roles.show',['role' => $data['role']['id']])}}" class="btn btn-outline-success">{{$data['role']['name']}}</a>
        </td>
    </tr>
    <tr>
        <td class="col text-capitalize fw-bold">
            @lang('email') :
        </td>
        <td class="col">
            {{$data['email']}}
        </td>
    </tr>
</table>

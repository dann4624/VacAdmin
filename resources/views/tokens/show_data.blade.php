<table class="table">
    <tr>
        <td class="col text-capitalize fw-bold">
            @lang('token') :
        </td>
        <td class="col">
            {{$data['token']}}
        </td>
    </tr>
    <tr>
        <td class="col text-capitalize fw-bold">
            @lang('target') :
        </td>
        <td class="col">
            <a href="{{route('targets.show',['target' => $data['target']['id']])}}" class="btn btn-outline-success">{{$data['target']['name']}}</a>
        </td>
    </tr>
    <tr>
        <td class="col text-capitalize fw-bold">
            @lang('role') :
        </td>
        <td class="col">
            <a href="{{route('roles.show',['role' => $data['role']['id']])}}" class="btn btn-outline-success">{{$data['role']['name']}}</a>
        </td>
    </tr>
</table>

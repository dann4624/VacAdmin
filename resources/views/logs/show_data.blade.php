<table class="table w-25">
    <tr>
        <td class="col text-capitalize fw-bold">
            @lang('action') :
        </td>
        <td class="col">
            <a href="{{route('logActions.show',['logAction' => $data['log_action']['id']])}}" class="btn btn-outline-success">{{$data['log_action']['name']}}</a>
        </td>
    </tr>
    <tr>
        <td class="col text-capitalize fw-bold">
            @lang('user') :
        </td>
        <td class="col">
            <a href="{{route('users.show',['user' => $data['user']['id']])}}" class="btn btn-outline-success">{{$data['user']['name']}}</a>
        </td>
    </tr>
    <tr>
        <td class="col text-capitalize fw-bold">
            @lang('data') :
        </td>
        <td class="col">
            {{$data['data']}}
        </td>
    </tr>
</table>

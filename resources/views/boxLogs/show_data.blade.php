<table class="table">
    <tr>
        <td class="col-2 text-capitalize fw-bold">
            @lang('time') :
        </td>
        <td class="col">
            {{date('d-m-Y H:i:s',strtotime($data['created_at']))}}
        </td>
    </tr>
    <tr>
        <td class="col-1 text-capitalize fw-bold">
            @lang('log') @lang('action') :
        </td>

        <td class="col text-capitalize">
            <a href="{{route('logActions.show',['logAction' => $data['log_action']['name']])}}" class="btn btn-outline-success">@lang($data['log_action']['name'])</a>
        </td>
    </tr>
    <tr>
        <td class="col-1 text-capitalize fw-bold">
            @lang('user') :
        </td>
        <td class="col">
            <a href="{{route('users.show',['user' => $data['user']['id']])}}" class="btn btn-outline-success">{{$data['user']['name']}}</a>
        </td>
    </tr>
    <tr>
        <td class="col-1 text-capitalize fw-bold">
            @lang('box') :
        </td>
        <td class="col">
            <a href="{{route('boxes.show',['box' => $data['box']['id']])}}" class="btn btn-outline-success">{{$data['box']['name']}}</a>
        </td>
    </tr>
    <tr>
        <td class="col-1 text-capitalize fw-bold">
            @lang('zone') :
        </td>
        <td class="col">
            @if(isset($data['zone']))
                <a href="{{route('zones.show',['zone' => $data['zone']['id']])}}" class="btn btn-outline-success">{{$data['zone']['name']}}</a>
            @endif
        </td>
    </tr>
    <tr>
        <td class="col-1 text-capitalize fw-bold">
            @lang('position') :
        </td>
        <td class="col">
            @if(isset($data['position']))
                <a href="{{route('positions.show',['position' => $data['position']['id']])}}" class="btn btn-outline-success">{{$data['position']['zone']['name']}} - @lang('position') {{$data['position']['name']}}</a>
            @endif
        </td>
    </tr>
</table>

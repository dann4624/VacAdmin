<table class="table w-25">
    <tr>
        <td class="col-1 text-capitalize fw-bold">
            @lang('time') :
        </td>
        <td class="col-2">
            {{date('d-m-Y H:i:s',strtotime($data['created_at']))}}
        </td>
    </tr>
    <tr>
        <td class="col text-capitalize fw-bold">
            @lang('action') :
        </td>
        <td class="col text-capitalize">
            <a href="{{route('logActions.show',['logAction' => $data['log_action']['id']])}}" class="btn btn-outline-success">@lang($data['log_action']['name'])</a>
        </td>
    </tr>
    <tr>
        <td class="col text-capitalize fw-bold">
            @lang('zone') :
        </td>
        <td class="col">
            <a href="{{route('zones.show',['zone' => $data['zone']['id']])}}" class="btn btn-outline-success">{{$data['zone']['name']}}</a>
        </td>
    </tr>
    <tr>
        <td class="col text-capitalize fw-bold">
            @lang('temperature') :
        </td>
        <td class="col">
            {{$data['temperature']}}
        </td>
    </tr>
    <tr>
        <td class="col text-capitalize fw-bold">
            @lang('humidity') :
        </td>
        <td class="col">
            {{$data['humidity']}}
        </td>
    </tr>
    <tr>
        <td class="col text-capitalize fw-bold">
            @lang('alarm') :
        </td>
        <td class="col text-capitalize">
            @if($data['alarm'] == 1)
                @lang('true')
            @elseif($data['alarm'] == 0)
                @lang('false')
            @endif
        </td>
    </tr>
</table>

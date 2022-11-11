<table class="table">
    <tr>
        <td class="col-1 text-capitalize fw-bold">
            @lang('type') :
        </td>
        <td class="col">
            <a href="{{route('types.show',['type' => $data['type']['id']])}}" class="btn btn-outline-success">{{$data['type']['name']}}</a>
        </td>
    </tr>
    <tr>
        <td class="col-1 text-capitalize fw-bold">
            @lang('position') :
        </td>
        <td class="col">
            <a href="{{route('positions.show',['position' => $data['position']['id']])}}" class="btn btn-outline-success">{{$data['position']['zone']['name']}} - {{$data['position']['name']}}</a>
        </td>
    </tr>
    <tr>
        <td class="col-1 text-capitalize fw-bold">
            @lang('batch') :
        </td>
        <td class="col">
            {{$data['batch']}}
        </td>
    </tr>
    <tr>
        <td class="col-1 text-capitalize fw-bold">
            @lang('expires') :
        </td>
        <td class="col">
            {{date('d-m-Y H:i:s',strtotime($data['expires_at']))}}
        </td>
    </tr>
</table>

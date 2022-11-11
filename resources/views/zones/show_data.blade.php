<h2 class="text-capitalize">
    @lang('types')
</h2>
<table class="table w-25">
    @foreach($data['types'] as $type)
    <tr>
        <td class="col">
            <a href="{{route('types.show',['type' => $type['id']])}}" class="btn btn-outline-success">{{$type['name']}}</a>
        </td>
    </tr>
    @endforeach
</table>
<h2 class="text-capitalize">
    @lang('amounts')
</h2>
<table class="table w-25">
    <tr>
        <td class="col text-capitalize fw-bold">
            @lang('positions') :
        </td>
        <td class="col">
            {{$data['positions_amount']}}
        </td>
    </tr>
    <tr>
        <td class="col text-capitalize fw-bold">
            @lang('boxes') :
        </td>
        <td class="col">
            {{$data['boxes_amount']}}
        </td>
    </tr>
    <tr>
        <td class="col text-capitalize fw-bold">
            @lang('available') :
        </td>
        <td class="col">
            {{$data['available_amount']}}
        </td>
    </tr>
</table>
<h2 class="text-capitalize">
    @lang('latest') @lang('log')
</h2>

<table class="table w-50">
    <tr>
        <td class="col text-capitalize fw-bold">
            @lang('time') :
        </td>
        <td class="col">
            {{date('d-m-y H:i:s',strtotime($data['latest_log']['created_at']))}}
        </td>
    </tr>
    <tr>
        <td class="col text-capitalize fw-bold">
            @lang('temperature') :
        </td>
        <td class="col">
            {{$data['latest_log']['temperature']}}
        </td>
    </tr>
    <tr>
        <td class="col text-capitalize fw-bold">
            @lang('humidity') :
        </td>
        <td class="col">
            {{$data['latest_log']['humidity']}}
        </td>
    </tr>
    <tr>
        <td class="col text-capitalize fw-bold">
            @lang('alarm') :
        </td>
        <td class="col text-capitalize">
            @if($data['latest_log']['alarm'] == 1)
                @lang('true')
            @elseif($data['latest_log']['alarm'] == 0)
                @lang('false')
            @endif
        </td>
    </tr>
</table>

<table class="table w-25">
    <tr>
        <td class="col text-capitalize fw-bold">
            @lang('shelf_life') :
        </td>
        <td class="col text-center">
            {{$data['shelf_life']}}
        </td>
    </tr>
    <tr>
        <td class="text-capitalize fw-bold">
            @lang('minimum') @lang('temperature'):
        </td>
        <td class="text-center">
            {{$data['minimum_temperature']}}
        </td>
    </tr>
    <tr>
        <td class="text-capitalize fw-bold">
            @lang('maximum') @lang('temperature') :
        </td>
        <td class="text-center">
            {{$data['maximum_temperature']}}
        </td>
    </tr>
</table>

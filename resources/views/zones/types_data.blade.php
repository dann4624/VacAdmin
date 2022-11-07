<thead>

</thead>
<tbody>
@foreach($types_list as $type)
    <tr>
        <td class="col-2">
            <input type="checkbox" name="{{$type['name']}}" id="{{$type['name']}}" value="{{$type['id']}}" @if(in_array($type['name'],$zone_types)) checked @endif>
        </td>
        <td class="col">
            <label for="{{$type['name']}}">
                @lang($type['name'])
            </label>
        </td>
    </tr>
@endforeach
</tbody>


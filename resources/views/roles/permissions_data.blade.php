<thead>

</thead>
<tbody>
    @foreach($permission_list as $permission)
        <tr>
            <td class="col-2">
                <input type="checkbox" name="{{$permission['name']}}" id="{{$permission['name']}}" value="{{$permission['id']}}" @if(in_array($permission['name'],$role_permissions)) checked @endif>
            </td>
            <td class="col">
                <label for="{{$permission['name']}}">
                    @lang($permission['name'])
                </label>
            </td>
        </tr>
    @endforeach
</tbody>


<div class="mt-2 row">
    <div class="col-2">
        <label for="user_id" class="fw-bold text-capitalize">@lang('user') : </label>
    </div>
    <div class="col">
        <select id="user_id" name="user_id" class="form-select">
            @foreach($users as $user)
                <option value="{{$user['id']}}" @if(old('user_id') == $user['id']) selected @elseif(isset($data['user']) && $data['user']['id'] == $user['id']) selected @endif>{{$user['name']}}</option>
            @endforeach
        </select>
    </div>
</div>

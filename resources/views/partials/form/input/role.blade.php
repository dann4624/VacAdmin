<div class="mt-2 row">
    <div class="col-md-4 col-lg-2">
        <label for="role_id" class="fw-bold text-capitalize">@lang('role') : </label>
    </div>
    <div class="col-md-8 col-lg-10">
        <select id="role_id" name="role_id" class="form-select">
            @foreach($roles as $role)
                <option value="{{$role['id']}}" @if(old('role_id') == $role['id']) selected @elseif(isset($data['role']) && $data['role']['id'] == $role['id']) selected @endif>{{$role['name']}}</option>
            @endforeach
        </select>
    </div>
</div>

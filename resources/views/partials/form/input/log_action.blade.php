<div class="mt-2 row">
    <div class="col-2">
        <label for="log_action_id" class="fw-bold text-capitalize">@lang('log action') : </label>
    </div>
    <div class="col">
        <select id="log_action_id" name="log_action_id" class="form-select">

            @foreach($logActions as $logAction)
                <option  class="text-capitalize" value="{{$logAction['id']}}" @if(old('log_action_id') == $logAction['id']) selected @elseif(isset($data['log_action']) && $data['log_action']['id'] == $logAction['id']) selected @endif>@lang($logAction['name'])</option>
            @endforeach
        </select>
    </div>
</div>

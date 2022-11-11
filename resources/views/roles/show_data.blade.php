<h2 class="text-capitalize">
    @lang('permissions')
</h2>
@foreach($data['permissions'] as $permission)
    {{$permission['name']}}<br>
@endforeach

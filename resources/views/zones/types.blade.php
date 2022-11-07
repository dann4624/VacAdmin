@extends('layouts.master')

@section('title')
    @lang('permissions')
@endsection
@section('content')
    <form action="{{route(request()->segment(1).'.types.submit',['id' => $data['id']])}}" method="post">
        <table class="table table-striped">
            @include(request()->segment(1).".types_data")
        </table>
        @include("partials.form.submit.update")
    </form>
@endsection

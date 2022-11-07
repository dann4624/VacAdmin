@extends('layouts.master')
@section('title')
    Velkommen
@endsection
@section('content')
    @lang('Welcome') @lang('to') {{config('app.name')}}
@endsection

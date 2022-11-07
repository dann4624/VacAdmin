@extends('layouts.master')
@section('title')
    Login
@endsection
@section('content')
    <form method="post" action="{{route('login.submit')}}" class="row g-3">
        @csrf
        <div class="col-auto">
            <label for="email" class="visually-hidden">Email</label>
            <input type="text" name="email" id="email"  placeholder="Username" class="form-control" value="{{ old('email') }}">
        </div>
        <div class="col-auto">
            <label for="password" class="visually-hidden">Password</label>
            <input type="password" name="password" id="password" placeholder="Password" class="form-control"  value="{{ old('password') }}">
        </div>
        <div class="col-auto">
            <input type="submit" value="Login" class="btn btn-success mb-3">
        </div>

    </form>
@endsection

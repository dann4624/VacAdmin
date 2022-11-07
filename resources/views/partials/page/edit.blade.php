@section('title')
    Edit
@endsection
@section('content')
    <form action="{{route(request()->segment(1).'.update',[$singular => $data['id']])}}" method="post">
        @include(request()->segment(1).".form_data")
        @include("partials.form.submit.edit")
    </form>
@endsection

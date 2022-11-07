@section('title')
    Create
@endsection
@section('content')
    <form action="{{route(request()->segment(1).'.store')}}" method="post">
        @include(request()->segment(1).".form_data")
        @include("partials.form.submit.create")
    </form>
@endsection

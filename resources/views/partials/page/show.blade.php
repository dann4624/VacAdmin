@section('title')
    Index
@endsection
@section('content')
    <h1>
        {{$data[$name]}}
    </h1>
    @include(request()->segment(1).".show_data")
@endsection


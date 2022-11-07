@section('title')
    Index
@endsection
@section('content')
    @include(request()->segment(1).".show_data")
@endsection

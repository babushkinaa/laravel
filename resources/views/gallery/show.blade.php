@extends('layouts.gallerylayout')

@section('content')
    <p></p>

    <div class="text-center">
        <a href="{{ URL::previous() }}"><img width="640" height="426" src="/{{$images->imagePath}}" class="rounded" alt="..."></a>
        {{--<img width="640" height="426" src="{{$images->imagePath}}" class="rounded" alt="...">--}}
    </div>


@endsection
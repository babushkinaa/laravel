@extends('layouts.gallerylayout')

@section('content')
    <p></p>

    <div class="text-center">
        <img width="640" height="426" src="/{{$images->imagePath}}" class="rounded" alt="...">
        {{--<img width="640" height="426" src="{{$images->imagePath}}" class="rounded" alt="...">--}}
    </div>


@endsection
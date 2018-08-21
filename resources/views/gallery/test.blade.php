@extends('layouts.gallerylayout')

@section('content')
    <p></p>

    <div class="text-center">
        @foreach($images as $image)
            {{--@foreach($category as $cat)--}}
        <a href="{{ URL::previous() }}"><img width="640" height="426" src="/{{$image->imagePath}}" class="rounded" alt="..."></a>
        <div>{{$image->category->category}}</div>
        {{--<img width="640" height="426" src="{{$images->imagePath}}" class="rounded" alt="...">--}}
{{--@endforeach--}}
@endforeach
    </div>


@endsection
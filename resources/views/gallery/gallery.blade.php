@extends('layouts.gallerylayout')

@section('content')

    <main role="main">


        <div class="album py-5 bg-light">
            <div class="container">
                {{dd($pages)}}

                <div class="row">
                @foreach($images as $image)
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            {{--<img class="card-img-top" data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=Thumbnail" alt="Card image cap">--}}
                            <img width="350" height="238" class="card-img-top" src="{{$image->imagePath}} " alt="Card image cap">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary" onClick='location.href="/show/{{$image->id}}"'>View</button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary" onClick='location.href="/edit/{{$image->id}}"'>Edit</button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary" onClick='location.href="/del/{{$image->id}}"'>Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                @foreach ($pages as $page)
                    {{ $page->image }}
                @endforeach
                {{$pages->links()}}

            </div>
        </div>

    </main>

@endsection
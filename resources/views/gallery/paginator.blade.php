@extends('layouts.gallerylayout')

@section('content')

    <main role="main">


        <div class="album py-5 bg-light">
            <div class="container">
                {{$pages->links()}}
                <div class="row">
                @foreach($pages as $page)
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            {{--<img class="card-img-top" data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=Thumbnail" alt="Card image cap">--}}
{{--                            <img width="350" height="238" class="card-img-top" src="{{$page->imagePath}} " alt="Card image cap">--}}
                            <a href="/show/{{$page->id}}"> <img width="350" height="238" class="card-img-top" src="{{$page->imagePath}} " alt="Card image cap"></a>

                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary" onClick='location.href="/show/{{$page->id}}"'>View</button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary" onClick='location.href="/edit/{{$page->id}}"'>Edit</button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary" onClick='location.href="/del/{{$page->id}}"'>Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                {{$pages->links()}}

            </div>
        </div>

    </main>

@endsection
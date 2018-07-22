@extends('layouts.galleryuploadlayout')

@section('content')

    <p></p>
    <div class="container">

        <div class="row">
            <div><img width="348px" height="238px" src="/{{$images->imagePath}}" class="rounded" alt="..."></div>
            <div class="col-md-6">

                {!! Form::open(array(
                'action' => 'ImageController@update',
{{--                'class' => "form-control my-2",--}}
                'class' => "form-control col-md-10",
                'files' => true
                )) !!}

                {{Form::file('image')}}
                {{Form::hidden('id_image', $images->id)}}

                {{Form::submit('Обновить', array(
                'class' => 'btn btn-success'
                ))}}

                {!! Form::close() !!}



            </div>
        </div>
    </div>
    </div>


@endsection
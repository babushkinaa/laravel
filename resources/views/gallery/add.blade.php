@extends('layouts.galleryuploadlayout')

@section('content')

    <p></p>


    <div class="container">

        <div class="row">
            <div class="col-md-3"></div>
                <div class="col-md-6">

                    {!! Form::open(array(
                    'action' => 'ImageController@create',
                    'class' => "form-control my-3",
                    'files' => true
                    )) !!}

                    {{Form::file('image')}}

                    {{Form::submit('Загрузить', array(
                    'class' => 'btn btn-success'
                    ))}}

                    {!! Form::close() !!}



                </div>
            </div>
        </div>
    </div>

@endsection
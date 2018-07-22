@extends('layouts.mylayout')

@section('content')

        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Login
                </div>

                <div>
                    <div class="links">
                        <a href="{{route('enter')}}">Login</a>
                        <a href="{{route('reg')}}">SignUp</a>
                        <a href="{{url('/gallery')}}">Gallery</a>
                    </div>

                </div>
                <br>


            </div>
        </div>
@endsection
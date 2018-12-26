@extends('layouts.adminLayout')

{{--Nav Bar--}}
@section('navBar')
    <ul class="nav justify-content-left">
        <li class="nav-item">
            <a class="nav-link active" href={{route('login1')}}>Login</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href={{route('register')}}>Register</a>
        </li>
    </ul>
    @endsection

<!-- Contents -->
@section('index')
            <header class="content__title">
                <!-- Jumbotron -->
                <div class="jumbotron">
                    <h1 class="display-3">Admin Panel za sajt : </h1>
                    <p class="lead">{{$settings->imeSajta}}</p>
                </div>
                <!-- end Jumbotron -->
            </header>
@endsection

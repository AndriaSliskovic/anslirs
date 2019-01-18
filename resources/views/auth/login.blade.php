@extends('layouts.adminIndex')

{{--@component('pocetna.components.homeKomponente',[--}}
    {{--'title'=>$naslov,--}}
    {{--'owner'=>$owner--}}
    {{--])--}}
{{--@endcomponent--}}

@section('navBar')
    <ul class="nav justify-content-left">
        <li class="nav-item">
            <a class="nav-link active" href={{route('login')}}>Login</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href={{route('register1')}}>Register</a>
        </li>
    </ul>
@endsection

@section('sadrzaj')
    {{--<h3>{{$settings->title}}</h3>--}}
    <!-- Login -->
<div class="login__block active" id="l-login">
    <div class="login__block__header">
        <i class="zmdi zmdi-account-circle"></i>
        Ukoliko ste regisrovani korisnik molimo vas da se prijavite

        <div class="actions actions--inverse login__block__actions">
            <div class="dropdown">
                <i data-toggle="dropdown" class="zmdi zmdi-more-vert actions__item"></i>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                <div class="dropdown-menu dropdown-menu-right">
                    {{--Registruj se--}}
                    <a class="dropdown-item" data-sa-action="login-switch" data-sa-target="#l-register" href="{{route('register')}}">Napravi nalog</a>
                    {{--Forgot password--}}
                    <a class="dropdown-item" data-sa-action="login-switch" data-sa-target="#l-forget-password" href="{{ route('password.request') }}">Zaboravljena lozinka?</a>
                </div>
            </div>
        </div>
    </div>

    <div class="login__block__body">
        {{--Pocetak forme--}}

        {{--Email--}}
        <div class="form-group">
            <input type="text" dusk="emailPolje" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email Address" name="email" required autofocus>
        </div>
        {{--Password--}}
        <div class="form-group">
            <input type="password" dusk="passPolje" placeholder="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
        </div>
        {{--submit--}}
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary" dusk="prijaviSe">
                    Prijavi se
                </button>
            </div>
        <a class="btn btn-link" href="{{ route('forgot') }}">
            Zaboravljena lozinka?
        </a>
        <a class="btn btn-link" href="{{ route('register1') }}">
            Napravi svoj nalog
        </a>
        </form>
        {{--Kraj forme--}}
    </div>
</div>
@endsection

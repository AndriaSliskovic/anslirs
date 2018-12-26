<!DOCTYPE html>
<html>
<head>
    @component('CRUD.komponente.head',[
    'title'=>$settings->title
    ])
    @endcomponent

    @stack('vendori_css')
</head>
<body data-sa-theme="1">
<main class="main">
    <!-- Header -->
    <header class="header header d-flex justify-content-around">
        <div class="navigation-trigger hidden-xl-up" data-ma-action="aside-open" data-ma-target=".sidebar">
            <i class="zmdi zmdi-menu"></i>
        </div>

        <div class="logo hidden-sm-down">
            <h1><a href="{{route('home')}}">
                    {{$settings->imeSajta}}</a></h1>
        </div>
    {{--@yield('navBar')--}}
        @if(!Auth::guest())
        <div class="user">
            <div class="user__info" data-toggle="dropdown">
                <img class="user__img" src="{{asset(Auth::user()->profile['avatar'])}}" alt="">
                <div>
                    <div class="user__name">{{Auth::user()->name}}</div>
                    <div class="user__email">{{Auth::user()->email}}</div>
                </div>
            </div>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{route('profile.show',['id'=>Auth::user()->id])}}">View Profile</a>
                <a class="dropdown-item" href="{{route('logout')}}">Logout</a>
                @if(Auth::user()->superadmin)
                    <a class="dropdown-item" href="{{route('settings.index')}}">Super admin podesavanja</a>
                @endif
            </div>
            @else
                @yield('navBar')
        @endif
        </div>


    </header>
    <!-- SIDEBAR -->
    <section id="sidebar">
        <aside class="sidebar">
            <div class="scrollbar-inner">
                @component('CRUD.komponente.sidebar')
                @endcomponent
            </div>
        </aside>
    </section>
    {{--NASLOV PROJEKTA--}}
    <section class="content">
        <div class="content__inner">
            {{--GLAVNI SADRZAJ--}}
            @yield($sadrzaj)
        </div>
    </section>
</main>
<!-- Vendors -->
@component('CRUD.komponente.vendori')
@endcomponent

@stack('vendori_js')
@stack('skripte_js')

<!-- App functions -->
@component('CRUD.komponente.skripte')
@endcomponent
</body>
</html>
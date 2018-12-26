<!DOCTYPE html>
<html lang="en">
@component('CRUD.komponente.head',[
'title'=>$settings->imeSajta
])
@endcomponent

@stack('vendori_css')

<body data-sa-theme=7>
<main class="main">


    <!-- Header -->
    <header class="header header d-flex justify-content-around">
        <div class="navigation-trigger hidden-xl-up" data-ma-action="aside-open" data-ma-target=".sidebar">
            <i class="zmdi zmdi-menu"></i>
        </div>

        <div class="logo hidden-sm-down">
            <h1><a href="{{route('home')}}">Logo</a></h1>
        </div>

       {{--View koji sluzi samo za Login i Register--}}
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
                </div>
        @else
            <ul class="nav justify-content-left">
                <li><a class="nav-link" href="{{ route('login1') }}">Login</a></li>
                <li><a class="nav-link" href="{{ route('register1') }}">Register</a></li>
            </ul>
            </div>
        @endif

    </header>
    <section id="sidebar">
        <aside class="sidebar">
            <div class="scrollbar-inner">
                {{--@yield($sidebar)--}}
            </div>
        </aside>
    </section>
    {{--NASLOV PROJEKTA--}}
    <section class="content">
        <div class="content__inner">
            {{--GLAVNI SADRZAJ--}}
            @yield('sadrzaj')
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
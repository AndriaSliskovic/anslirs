<!doctype html>
<html lang="en">
<head>
@component('FRONT.komponente.layoutsComponent.head',[
'title'=>$settings->title
])
    @endcomponent
</head>
<body class="breadcrumbmenu" onload="loader()">
<!--======== Loader  =================-->
<div id="load">
    <div id="loader">
        <img src="{{asset('front/images/loader.gif')}}" alt="loader">
    </div>
</div>
<!--======== /Loader - ucitavanje =================-->
<div id="main_div">

    <!-- HEADER -->
    <header class="header">

        @component('FRONT.komponente.layoutsComponent.header',[
        'menu'=>$menu,
        'settings'=>$settings
        ])
            @endcomponent
    </header><!-- /HEADER -->
    <!-- SIDEBAR LEFT -->
    <aside class="sidebar">

        @component('FRONT.komponente.layoutsComponent.sidebarLeft',[
        'menu'=>$menu,
        'settings'=>$settings,
        ])
            @endcomponent
    </aside>
    <!-- /SIDEBAR LEFT -->
    <!-- CONTENT -->

    @yield('content')

<!-- FOOTER -->

    @component('FRONT.komponente.layoutsComponent.footer',[
        'menu'=>$menu,
        'settings'=>$settings
    ])
        @endcomponent

    <div class="overlay"></div>
    <!-- SKRIPTE -->

    @component('FRONT.komponente.layoutsComponent.scripts')
        @endcomponent
</div><!-- /CONTENT -->
</body>
</html>
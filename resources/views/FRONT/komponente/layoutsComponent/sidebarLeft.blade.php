<!--============ Sidebar ==============-->
<!-- PADAJUCI SIDE BAR -->

<!-- MENU SIDE BAR -->

<a href="{{route('home')}}" class="logo" title="ANSLI D.O.O."><img src="{{asset($settings->logo)}}" alt="logo"></a>
<a class="close"><i class="icofont icofont-close-line"></i></a>
<ul>
    <!-- VERT MENU -->

    @component('FRONT.komponente.vertMenu',[
    'menu'=>$menu,
    'settings'=>$settings
    ])
        @endcomponent
</ul>
<!-- /VERT MENU -->
<!-- /BLOG SIDE BAR -->
<!--============ /Sidebar ==============-->
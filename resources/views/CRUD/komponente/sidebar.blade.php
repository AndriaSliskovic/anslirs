<ul class="nav flex-column">
    <li class="nav-item">
        <a class="nav-link active" href="{{route('home')}}">Home</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('kategorije.index')}}">Kategorije</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('oblast.index')}}">Oblasti</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('user.index')}}">Useri</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('tipovi.index')}}">Tipovi</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('postovi.index')}}">Postovi</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('menu.index')}}">Menu</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('dokumenti.index')}}">Dokumenti</a>
    </li>
    <li class="navigation__sub @@variantsactive">
        <a href=""><i class="nav-link"></i> Front</a>

        <ul>
            <li class="@@sidebaractive"><a href="{{route('section.index')}}">Sekcije</a></li>
            <li class="@@sidebaractive"><a href="{{route('sectCat.index')}}">Kategorije sekcija</a></li>
            {{--<li class="@@boxedactive"><a href="#">Boxed Layout</a></li>--}}
            {{--<li class="@@hiddensidebarboxedactive"><a href="#">Boxed Layout with Hidden Sidebar</a></li>--}}
        </ul>
    </li>

</ul>
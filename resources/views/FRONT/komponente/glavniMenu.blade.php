<!-- GLAVNI MENU -->
<div class="col-xs-12 col-sm-12 col-lg-9 text-right">
    <div class="menu">
        <a class="baricon"><span>Menu</span><i class="fa fa-bars"></i></a>
        <ul>
            <li><a title="Side Menu" href="javascript:void(0);"><i class="fa fa-bars menuclick"></i></a></li>
            @foreach($menu as $m)
            <li>
                {{--Promeniti rute--}}
                <a title="{{$m->name}}" href="{{route($m->putanja)}}">{{$m->name}}</a>
                <i class="fa fa-angle-down marrow"></i>
            </li>
            @endforeach
        </ul>
    </div>
</div>
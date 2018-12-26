
<div class="photohead">
    <!-- Header 1 -->
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-3 col-lg-4">
                <a href="{{route('home')}}" class="logo" title="ANSLI D.O.O."><img src="{{asset($settings->logo)}}" alt="logo" style="height: 50px;width: 100px"></a>
            </div>
            <ul class="callto">
                <li><span>Pozovite nas na tel : {{$settings->telefon}}</span></li>
                <li><span> Ili nam se obratite emailom : {{$settings->email}}<span></li>
            </ul>
            <!-- Serarch polje -->
            {{--<div class="search navbar-right col-lg-2 vcenter" style="margin-top: 15px" id="serach">--}}
                {{--<form class="search-header">--}}
                    {{--<input type="search" placeholder="Search">--}}
                    {{--<i class="fa fa-search psearch"></i>--}}
                    {{--<i class="fa fa-close sclose"></i>--}}
                    {{--<button class="fa fa-search"></button>--}}
                {{--</form>--}}
            {{--</div>--}}
        </div>
    </div>
</div>
<!-- /Header 1 -->

<!-- Header 2 -->
<div class="headmenu" data-spy="affix" data-offset-top="60" data-offset-bottom="200">
    <div class="container">
        <div class="row">
            @component('FRONT.komponente.glavniMenu',[
            'menu'=>$menu
            ])
                @endcomponent
        </div>
    </div>
</div>
<!-- /Header 2 -->


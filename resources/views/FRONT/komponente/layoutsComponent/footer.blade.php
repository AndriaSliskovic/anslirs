<!--=========== Footer ==========-->
<div class="callaction">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <p>Sav kvalitet na jednom mestu !</p>
            </div>
        </div>
    </div>
</div>
<footer class="footer photofoot">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-lg-3">
                {{--<a href="index.html" title="Blog Site Template"><img src="images/footlogo.png" alt="Logo"></a>--}}
                <a href="{{route('home')}}" title="Ansli D.O.O."><img src="{{asset($settings->logo)}}" alt="Logo"></a>

                <p>Kompletna knjigovodsvena usluga sa pratećim softverom i softverom po želji </p>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-6">
                <ul class="fmenu">
                    @foreach($menu as $m)
                    <li><a href="{{route($m->putanja)}}" title="{{$m->name}}">{{$m->name}}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-3">
                {{--<h6>Adresa :</h6>--}}
                <address itemscope itemtype="https://schema.org/Person">
                    <span itemprop="address">{{$settings->adresa}}</span>,<br>
                    <span itemprop="homeLocation" >{{$settings->mesto}}</span><br> <span itemprop="email">{!! $settings->email !!} </span> | <span itemprop="telephone">{{$settings->telefon}}</span>
                </address>
            </div>
        </div>
    </div>
</footer>
<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <p>ANSLI D.O.O. 2017.</p>
            </div>
        </div>
    </div>
</div>
<!--=========== /Footer ==========-->
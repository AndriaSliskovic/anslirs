<div class="mainslide owl-carousel" dusk="caruserVeliki">
    @foreach($var as $v)
    <div class="item" >
        <img src="{{asset($v->slika)}}" alt="slide1">
        <div class="carousel-caption">
            <span>
                <h3 style="color: white;">

                    {{$v->naslov}}

                </h3>

            </span>
            <h5>{{$v->podnaslov}}</h5>
        </div>
    </div>
    @endforeach

</div>
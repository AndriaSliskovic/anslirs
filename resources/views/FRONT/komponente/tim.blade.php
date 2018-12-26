<article id="about">

    <div class="head"><h6>{{$var->naslov}}</h6></div>
    <img src="{{asset($var->slika)}}" class="aboutimg" alt="slika">
    <p>{{$var->podnaslov}}</p>
    <p>{!! $var->sadrzaj !!}</p>
</article>
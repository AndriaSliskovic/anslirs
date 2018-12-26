<article id="about">
    <span>Objavio :</span>
    <div class="head"><h6>{{$var->name}}</h6></div>
    <img src="{{asset($var->profile->avatar)}}" class="aboutimg" alt="slika {{$var->name}}">
    <p>email : {{$var->email}}</p>
</article>
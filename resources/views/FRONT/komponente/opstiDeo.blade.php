{{--<h6>{{$var->naslov}}</h6>--}}
<p class="blok-teksta-srednjiBlog">{!! $var->sadrzaj !!}</p>
{{--<p class="blok-teksta-srednjiBlog">{{$var->sadrzaj}}</p>--}}
<a href="{{route('about')}}" class="button">{{$var->naslov}}</a>
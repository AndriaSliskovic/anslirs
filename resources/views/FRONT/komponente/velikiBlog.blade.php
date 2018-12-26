<!-- Glavni Bolog -->
<section id="glavniBlog">
    @foreach($var as $v)
    <div class="weekday">
        <div class="excerpt_data">
            <a href="{{route('single',['slug'=>$v->slug])}}" class="border"><img src="{{asset($v->slika)}}" class="img-responsive" alt="blog"></a>
            <a href="{{route('single',['slug'=>$v->slug])}}">
            <article >
                <div class="top" >
                    <h6>{{$v->naslov}}</h6>
                    <p class="category_name"><i class="fa fa-briefcase"></i>Kategorija :  {{$v->category->name}}</p>
                    <p class="category_name"><i class="fa fa-user"></i>Objavio :  {{$v->user->name}}</p>
                </div>
                {{--<div class="blok-teksta-blogVeliki">--}}
                    {{--<p >{!! $v->sadrzaj !!}</p>--}}
                {{--</div>--}}

                <a href="{{route('single',['slug'=>$v->slug])}}" class="button">Procitaj vise</a>
            </article>
            </a>
        </div>
    </div>
    <hr>

@endforeach
        {{$var->links('vendor.pagination.bootstrap-4')}}
</section>

<!-- /Glavni Bolog -->
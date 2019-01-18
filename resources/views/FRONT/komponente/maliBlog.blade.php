<article class="blogpost" id="vazniPostovi" >

	<div class="head"><h6>Važni postovi</h6></div>
	<!-- Desni Blog -->
	@foreach($var as $v)
	<div class="col-sm-12 col-lg-4 padded">
		<a href="{{route('single',['slug'=>$v->slug])}}"><img src="{{asset($v->slika)}}" class="img-responsive" alt={{$v->naslov}}></a>
	</div>
		<a href="{{route('single',['slug'=>$v->slug])}}">
	<div class="col-sm-12 col-lg-8 text-left blok-teksta-maliBlog">
		{{$v->naslov}}
		<div>
			<span>kategorija : {{$v->category->name}}</span>
		</div>
		<div>
			<span>objavljeno : {{Carbon\Carbon::parse($v->vremeIzrade)->diffForHumans()}}</span>
		</div>

	</div>
		</a>
	<hr>
	@endforeach
	<!-- /Desni Blog -->
	<div class="clearfix"></div>
	{{--Paginacija promenljive $var--}}
	{{$var->links('vendor.pagination.bootstrap-4')}}
</article>
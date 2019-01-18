<section dusk="srednjiBlogAll">
@foreach($var as $v)

	<!-- Srednji Blog All -->
		<div class="col-sm-12 col-md-6 col-lg-6 text-center" style="margin-bottom:15px;">
			<a class="border" href="{{route('single',['slug'=>$v->slug])}}"><img class="img-responsive" alt="blog" src="{{asset($v->slika)}}"></a>
			<article >
				<p class="category_name">Kategorija : {{$v->category->name}}</p>

				<div class="blok-teksta-naslov">
					<h6><a href="{{route('single',['slug'=>$v->slug])}}">{{$v->naslov}}</a></h6>
				</div>
				<p class="category_name">{{Carbon\Carbon::parse($v->vremeIzrade)->diffForHumans()}} | Objavio <a href="#">{{$v->user->name}}</a></p>
				<div id="sadrzaj" class="blok-teksta-vesti">
					<p  >{!! $v->sadrzaj !!}</p>
				</div>

				<a href="{{route('single',['slug'=>$v->slug])}}" class="button">Pročitaj više</a>
			</article>
		</div>
		<!-- /Srednji Blog All -->
	@endforeach
	{{$var->links('vendor.pagination.bootstrap-4')}}
</section>





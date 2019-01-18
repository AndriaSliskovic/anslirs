<div id="srednjiBlog">
	@foreach($var as $v)
		<div class="col-sm-12 padded" >
			<div class="col-sm-12 col-md-6 col-lg-6 Lpadded text-center">
				<a href="{{route('single',['slug'=>$v->slug])}}" class="border"><img src="{{$v['slika']}}" alt="{{$v->naslov}}" class="img-responsive"></a>
			</div>
			<div class="col-sm-12  col-md-6 col-lg-6 Lpadded text-left">

				<article >

					<p class="category_name">Kategorija : {{$v->category->name}}</p>
					<a href="{{route('single',['slug'=>$v->slug])}}">
						<h6>{{$v->naslov}}</h6>
						<p class="category_name">{{Carbon\Carbon::parse($v->vremeIzrade)->diffForHumans()}} | Objavio {{$v->user->name}}</p>
						<div class="blok-teksta-srednjiBlog">
							<p>{!! $v->sadrzaj !!}</p>
						</div>
					</a>

					<a href="{{route('single',['slug'=>$v->slug])}}" class="button align-bottom">Pročitaj više</a>


				</article>

			</div>
		</div>
	@endforeach
	{{$var->links('vendor.pagination.bootstrap-4')}}
</div>

<div class="col-sm-12 col-md-8 col-lg-8 text-left" dusk="velikiBlogSingle">
	<div class="white_box bloddetail">
		<div class="weekday">
			<div class="excerpt_data">
				<img src="{{asset($post->slika)}}" class="img-responsive" alt="{{$post->naslov}}">
				<article>
					<p class="category_name"><i class="fa fa-briefcase"></i>Kategorija : {{$post->category->name}}</p>
					<p class="category_name"><i class="fa fa-user"></i>Datum : {{$post->vremeIzrade}} | autor : {{$post->user->name}}</p>
					<hr>
					<h6>{{$post->naslov}}</h6>
					{{--<p>{{$post->sadrzaj}}</p>--}}
					<p>{!! $post->sadrzaj !!}</p>
				</article>
			</div>
		</div>
	</div>
</div>
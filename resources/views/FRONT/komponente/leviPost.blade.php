<!-- Blok posta -->
@foreach($post as $p)
		<div class="col-lg-12">

		<li class="col-sm-12 col-lg-4">
		<a href="#"><img alt="blog" class="img-responsive" src="{{asset($p->slika)}}">{{$p->naslov}}</a>
		</li>

		</div>
@endforeach
		<!-- /Blok -->
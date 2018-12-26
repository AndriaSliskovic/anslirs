<article id="kategorije">
	<div class="head"><h6>Kategorije</h6></div>
	<ul class="cate">
		@foreach($kategorije as $kat)
		<li><a href="{{route('katPostova',['id'=>$kat->id])}}">{{$kat->name}} ( {{$kat->posts->count()}} )</a></li>
		@endforeach
	</ul>
</article>
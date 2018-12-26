@foreach($var as $v)
<div class="slidebox">
	<img src="{{$v['slika']}}" alt="slide">
	<div class="sdata">
		<span>{{$v['naslov']}}</span>
		<h6>{{$v['podnaslov']}}</h6>
	</div>
</div>
	@endforeach

@foreach($menu as $m)
		<li><a title={{$m->name}} href="{{route($m->putanja)}}">{{$m->name}}</a></li>
	@endforeach
{{ Form::open(['route' =>[$route['editRoute'], $obj->id], 'method' => 'get'] )  }}
{{ Form::submit("Promeni", ['class' => 'btn btn-warning btn-xs ','dusk'=>'promeni-'.$obj->id.'']) }}
{{ Form::close() }}
</td>
<td class="text-right">
{{ Form::open(['route' =>[$route['destroyRoute'], $obj->id], 'method' => 'delete'] )  }}
{{ Form::submit("Obrisi", ['class' => 'btn btn-danger btn-xs','dusk'=>'obrisi-'.$obj->id.'']) }}
{{ Form::close() }}
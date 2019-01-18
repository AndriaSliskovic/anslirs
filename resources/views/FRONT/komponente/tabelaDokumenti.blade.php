<table class="table table-striped" dusk="tabelaDokumenti">
    <thead>
    <tr>
        <th>Naziv dokumenta</th>
        <th>
            {{--Select--}}
            {{ Form::open() }}
            {{ csrf_field() }}
            <div class="select">
                <select id="selectCategory" class="form-control" onchange="showSelect()">
                    <option>Izaberi oblast</option>
                    <option value="0">Sve oblasti</option>
                    @foreach($oblast as $s)
                        <option value="{{$s->id}}" data-field="{{$s->id}}">{{$s->name}}</option>
                    @endforeach
                </select>
            </div>
            {{Form::close()}}
        </th>
    </tr>
    </thead>
    <tbody>
    @foreach($var as $v)
    <tr>
        <td class="align-middle col-sm-12 col-md-8 col-lg-8">{{$v->name}}</td>
        <td class="align-middle col-sm-12 col-md-4 col-lg-4">
            <a href="{{asset($v->putanja)}}" target="_blank">
                <button type="button" class="btn btn-default">Preuzmi - {{$v->name}}</button>
            </a>
        </td>
    </tr>
        @endforeach
    </tbody>
</table>
<script type="text/javascript">
    function showSelect() {
        var selectId=document.getElementById('selectCategory').value;
        if (selectId==0){
            var url='/download';
            return jQueryAjax(url,selectId);
        }
        console.log(selectId);
        var ruta='/download/';
        var url=ruta+selectId;
        return jQueryAjax(url,selectId);
    }

    function jQueryAjax(url,id) {
        $.ajax({
            type: "GET",
            url: url,
            headers: {'X-CSRF-Token': '{{ csrf_field() }}'},
            success: function(response) {
                window.location.href=url;
            }
        })
    }
</script>
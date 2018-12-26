@extends('layouts.adminLayout')


@section('index')
<section id="index">
    <div class="card col-lg-12">
        <!-- Card Header -->
        <div class="card-header row justify-content-between">
        {{--Create Grupa--}}
            @component('CRUD.komponente.createGrupa',
            ['naslov'=>$naslov,
            'route'=>$route
            ])
                @endcomponent
        </div>
        <!--  -->
        <div class="card-body">

            <table class="tabela-admin table table-hover">
                <thead>
                <tr>
                    <th scope="col">Naslov</th>
                    <th scope="col">Podnaslov</th>
                    <th scope="col">ID</th>
                    <th scope="col">
                        {{--Select tag--}}
                        {{ Form::open() }}
                        {{ csrf_field() }}
                            <div class="select">
                                <select id="selectCategory" class="form-control" onchange="showSelect()">
                                    <option>Izaberi kategoriju</option>
                                    <option value="0">Sve kategorije</option>
                                    @foreach($sectCat as $s)
                                        <option value="{{$s->id}}" data-field="{{$s->id}}">{{$s->name}}</option>
                                        @endforeach
                                </select>
                            </div>

                    </th>
                    {{ Form::close() }}
                </tr>
                </thead>
                <tbody>
                @foreach($var as $obj)
                    <tr >
                        <td class="align-middle">{{$obj->naslov}}</td>
                        <td class="align-middle">{{$obj->podnaslov}}</td>
                        <td class="align-middle">{{$obj->sectCat['id']}}</td>
                        <td class="align-middle">{{$obj->sectCat['name']}}</td>
                        <td scope="col" class="text-right"><a href="#">
                     {{--editDeleteGrupa--}}
                        @component('CRUD.komponente.editDeleteGrupa',
                        [
                        'obj'=>$obj,
                        'route'=>$route
                        ])
                            @endcomponent
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
</section>
<script type="text/javascript">
    //SKRACENA VARIJANTA
    function prikaziRezultate() {
        var url='{{route('test')}}';
        $.get(url,function (data) {
            console.log(data)
        });
        console.log("Ajax klik",url);
        //jQueryAjax(url,null);

    }

    function showSelect() {
        var selectId=document.getElementById('selectCategory').value;
        if (selectId==0){
            var url='/admin/section/';
            return jQueryAjax(url,selectId);
        }
        console.log(selectId);
        var ruta='/admin/section/';
        var url=ruta+selectId;
        return callAjax(url,selectId);
    }

    function jQueryAjax(url,id) {
        $.ajax({
            type: "GET",
            url: url,
            data: {id:id},
            headers: {'X-CSRF-Token': '{{ csrf_field() }}'},
            success: function(response) {
                window.location.href=url;
            }
        })
    }

    function callAjax(url,id){
        var xhr = new XMLHttpRequest();

        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                console.log('prosledjen ajax na : ',url);
                window.location.href=url;
            }
        };
        xhr.open('GET', url,true);
        xhr.setRequestHeader('X-CSRF-Token', '{{ csrf_field() }}');
        xhr.send();
    }

</script>
@endsection
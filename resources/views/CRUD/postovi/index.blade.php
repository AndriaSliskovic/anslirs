@extends('layouts.adminLayout')


<!-- Svi postovi -->
@section('index')
    <section id="sviProjekti">
        <div class="card col-lg-12">
            {{--Header kartice--}}
            <div class="card-header row justify-content-between">
                @component('CRUD.komponente.createGrupa',
            ['naslov'=>$naslov,
            'route'=>$route
            ])
                @endcomponent

            </div>
            <div class="card-body">
                <table class="tabela-admin table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Slika</th>
                        <th scope="col">Naslov</th>
                        <th scope="col">Kategorija</th>
                        <th scope="col">
                            {{--Select tag--}}
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
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody >
                    @foreach($var as $obj)
                    <tr >
                        <td><img src="{{asset($obj->slika)}}" alt="slika posta" width="90px" height="60px"></td>
                        <td class="align-middle">{{$obj->naslov}}</td>
                        <td class="align-middle">{{$obj->category['name']}}</td>
                        <td class="align-middle">{{$obj->category->oblast['name']}}</td>
                        <td scope="col" class="text-right align-items-center">
                            {{-- editDeleteGrupa--}}
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
        function showSelect() {
            var selectId=document.getElementById('selectCategory').value;
            if (selectId==0){
                var url='/admin/postovi/';
                return jQueryAjax(url,selectId);
            }
            console.log(selectId);
            var ruta='/admin/postovi/';
            var url=ruta+selectId;
            return jQueryAjax(url,selectId);
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
        </script>
@endsection
<!-- Svi projekti -->
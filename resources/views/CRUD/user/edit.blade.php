@extends('layouts.adminLayout')

<!-- FormaZaIzmenuProjekata -->
@section('edit')
    <section id="editPostova">
        <div class="card col-lg-12">
            <div class="card-header">
                <div class="col-12">
                    <h4>{{$naslov}}</h4>
                </div>
            </div>
            <div class="card-body">
                {{--<form action="{{route('projekti.update',['id'=>$var->id])}}" method="put" enctype="multipart/form-data" >--}}
                {{Form::model($var, ['route' =>[$route['updateRoute'], $var->id], 'method' => 'put','files' => true])}}
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Ime</label>
                    <input type="text" name="name" class="form-control col-lg-6" value="{{$var->name}}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control col-lg-6" value="{{$var->email}}">
                </div>
                <div class="row align-items-end">
                <div class="form-group col-lg-6" >
                    <label for="avatar">Odaberite fajl za sliku</label>
                    <input type="file" name="avatar" class="form-control ">

                    <label for="password">Lozinka</label>
                    <input type="password" name="password" class="form-control " >
                </div>

                <div class="col-lg-2 ">
                    <label for="imagePreview " class="text-center">Odabir slike</label>
                    <img src="{{asset($var->profile->avatar)}}" alt="profilnaSlika" class="rounded mx-auto d-block " style="width:128px;height:158px;margin-bottom: 5px; padding-bottom: 15px;" name="imagePreview"/>
                </div>
                </div>

                <div class="form-group">
                    @component('CRUD.komponente.submitGrupa')
                    @endcomponent
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </section>
@endsection
<!-- EndOfFormaZaIzmenuProjekata -->
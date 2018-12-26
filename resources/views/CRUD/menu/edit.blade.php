@extends('layouts.adminLayout')

@section('edit')
    <section id="edit">
        <div class="card col-lg-6">
            <!-- Card Header -->
            <div class="card-header row justify-content-between">
                <div class="col-8">
                    <h4>{{$naslov}}</h4>
                </div>
            </div>
            <div class="card-body">
                {{Form::model($var, ['route' =>[$route['updateRoute'], $var->id], 'method' => 'put'])}}
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="text" class="form-control input-sm" placeholder="Naziv smenija" name="name" value="{{$var->name}}">
                    <i class="form-group__bar"></i>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control input-sm" placeholder="Putanja" name="putanja" value="{{$var->putanja}}">
                    <i class="form-group__bar"></i>
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
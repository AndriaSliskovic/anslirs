@extends('layouts.adminLayout')

<!-- FormaZaIzmenuProjekata -->
@section('edit')
<section id="editProfila">
<div class="card col-lg-12">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <h4>{{$naslov}}</h4>
            <h4 class="text-right" style="padding-right: 25px">{{$user->name}}</h4>
        </div>
    </div>
    <div class="card-body">
    {{Form::model($var, ['route' =>[$route['updateRoute'], $var->id], 'method' => 'put','files' => true])}}
                {{ csrf_field() }}
    <div class="row">
        <div class="card col-lg-5">
        <div class="card-body ">
            <div class="form-group col-lg-6" >
                <label for="password">Nova lozinka</label>
                <input type="password" name="password" class="form-control ">
                <label for="repassword">Ponovite lozinku</label>
                <input type="password" name="repassword" class="form-control ">
            </div>
        </div>
        </div>

        <div class="card col-lg-5">
        <div class="card-body ">
            <div class="form-group">
        @if($var->avatar)
            <div class=" d-flex justify-content-start ">
                    <img src="{{asset($var->avatar)}}" alt="profilnaSlika" class="rounded mx-auto d-block " style="width:128px;height:158px;margin-bottom: 5px; padding-bottom: 15px;" name="imagePreview"/>
            </div>
            @else
            <h4>Nemate odabranu profilnu sliku</h4>
            @endif
            <label for="avatar">Odaberite fajl za sliku</label>
            <input type="file" name="avatar" class="form-control ">
            </div>
        </div>
        </div>
    </div>

    <div class="card col-lg-12">
        <div class="row">
            <div class="card-body col-lg-4 ">
                {{--CheckBox--}}
                <div class="form-group">
                    {{Form::label('admin', 'Admin')}}
                    {{Form::checkbox('admin', $user->admin,true)}}
                </div>
                {{--<!-- Select tag -->--}}
                <div class="form-group">
                    <label for="oblast">Oblast rada : </label>
                    <span>{{$user->oblast->name}}</span>
                </div>
            </div>
            <div class="card-body col-lg-4 ">
                <div class="form-group">
                    @component('CRUD.komponente.submitGrupa')
                    @endcomponent
                </div>
            </div>
        </div>

    </div>
            {{--</form>--}}
    {{ Form::close() }}
        </div>
    </div>
</section>
@endsection
<!-- EndOfFormaZaIzmenuProjekata -->
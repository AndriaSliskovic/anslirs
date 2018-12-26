@extends('layouts.adminLayout')

<!-- FormaZaIzmenuProjekata -->
@section('create')
    <section id="editProfila">
        <div class="card col-lg-12">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h4>{{$naslov}}</h4>
                    <h4 class="text-right" style="padding-right: 25px">{{$user->name}}</h4>
                </div>
            </div>
            <div class="card-body">

            {{Form::model($user, ['route' =>[$route['storeRoute'], $user->id], 'method' => 'post','files' => true])}}
            {{ csrf_field() }}
            <div class="row">
                <div class="card col-lg-6">
                    <div class="card-body ">
                    <label for="#">User name</label>
                    <h4>{{$user->name}}</h4>
                    <label for="#">E mail</label>
                    <h4>{{$user->email}}</h4>
                    </div>
                </div>
                <div class=" form-group col-lg-6 ">
                @if($user->avatar)
                        <img src="{{asset($user->avatar)}}" alt="profilnaSlika" class="rounded mx-auto d-block " style="width:128px;height:158px;margin-bottom: 5px; padding-bottom: 15px;" name="imagePreview"/>
                @else
                    <h4>Nemate odabranu profilnu sliku</h4>
                @endif
                    <label for="avatar">Odaberite fajl za sliku</label>
                    <input type="file" name="avatar" class="form-control ">
                </div>
            </div>
            <div class="row">
                <div class="card col-lg-6">
                    <div class="card-body ">
                <label for="password">Nova lozinka</label>
                <input type="password" name="password" class="form-control col-lg-6">

                <label for="repassword">Ponovite lozinku</label>
                <input type="password" name="repassword" class="form-control col-lg-6">
                </div>
                </div>
            </div>
            <div class="card col-lg-6">
                <div class="card-body ">
                <div class="form-group">
                    <label for="about">About</label>
                    <input type="text" name="about" class="form-control" value="{{old('about')}}">
                </div>
                <div class="form-group">
                    <label for="facebook">Facebook putanja</label>
                    <input type="text" name="facebook" class="form-control" value="{{old('facebook')}}">
                </div>
                <div class="form-group">
                    <label for="youtube">You tube putanja</label>
                    <input type="text" name="youtube" class="form-control" value="{{old('youtube')}}">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">
                            Upiši podatke
                        </button>
                    </div>
                </div>
                </div>
            </div>
            {{ Form::close() }}
            </div>
        </div>
    </section>
@endsection
<!-- EndOfFormaZaIzmenuProjekata -->
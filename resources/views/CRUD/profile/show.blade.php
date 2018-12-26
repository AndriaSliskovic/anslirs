@extends('layouts.adminLayout')

<!-- FormaZaIzmenuProjekata -->
@section('show')
    <section id="editProfila">
        <div class="card col-lg-12">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h4>{{$naslov}}</h4>
                    <h4 class="text-right" style="padding-right: 25px">{{$var->name}}</h4>
                </div>
            </div>
            <div class="card-body">

                {{Form::model($var, ['route' =>[$route['updateRoute'], $var->id], 'method' => 'put','files' => true])}}
                {{ csrf_field() }}
                <div class="row">
                    <div class="form-group col-lg-6" >
                        <label for="avatar">Odaberite fajl za sliku</label>
                        <input type="file" name="avatar" class="form-control ">

                        <label for="password">Nova lozinka</label>
                        <input type="password" name="password" class="form-control ">
                        <label for="repassword">Ponovite lozinku</label>
                        <input type="password" name="repassword" class="form-control ">
                    </div>
                @if($var->avatar)
                    <div class=" d-flex justify-content-start ">
                            <img src="{{asset($var->avatar)}}" alt="profilnaSlika" class="rounded mx-auto d-block " style="width:128px;height:158px;margin-bottom: 5px; padding-bottom: 15px;" name="imagePreview"/>
                    </div>
                    @else
                    <h4>Nemate odabranu profilnu sliku</h4>
                    @endif
                </div>


            <div class="form-group">
                <label for="about">About</label>
                <input type="text" name="about" class="form-control col-lg-6" value="{{$var->about}}">
            </div>
            <div class="form-group">
                <label for="facebook">Facebook putanja</label>
                <input type="text" name="facebook" class="form-control col-lg-6" value="{{$var->facebook}}">
            </div>
            <div class="form-group">
                <label for="youtube">You tube putanja</label>
                <input type="text" name="youtube" class="form-control col-lg-6" value="{{$var->youtube}}">
            </div>
            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">
                        Promeni podatke
                    </button>
                </div>
            </div>
            {{--</form>--}}
                {{ Form::close() }}
            </div>
        </div>
    </section>
@endsection
<!-- EndOfFormaZaIzmenuProjekata -->
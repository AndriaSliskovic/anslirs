@extends('layouts.adminLayout')

<!-- SettingsController -->
@section('index')
    <section id="settings">
        <div class="card col-lg-6">
            <div class="card-header">
                <div class="col-12">
                    <div class="row">
                        <h4>{{$naslov}}</h4>
                        {{--ERROR SESSION--}}
                        @if ($errors->any())
                            @component('CRUD.komponente.errorSession')
                            @endcomponent
                        @endif
                        {{--END SESSION--}}
                    </div>
                </div>
            </div>
            <div class="card-body">
                {{--<form action="{{route('settings.store')}}" method="post" >--}}
                {{Form::model($var, ['route' =>['settings.update', $var->id], 'method' => 'put','files' => true])}}
                {{ csrf_field() }}
                <div class="form-group col-lg-6">
                    <label for="imeSajta">Ime sajta</label>
                    <input type="text" class="form-control input-sm" placeholder="Ime sajta" name="imeSajta" value="{{$var->imeSajta}}">
                    <i class="form-group__bar"></i>
                </div>
                <div class="form-group col-lg-6">
                    <label for="title">Title</label>
                    <input type="text" class="form-control input-sm" placeholder="Title" name="title" value="{{$var->title}}">
                    <i class="form-group__bar"></i>
                </div>
                <div class="form-group col-lg-6">
                    <label for="adresa">Adresa</label>
                    <input type="text" class="form-control input-sm" placeholder="Adresa" name="adresa" value="{{$var->adresa}}">
                    <i class="form-group__bar"></i>
                </div>
                <div class="form-group col-lg-6">
                    <label for="email">Email</label>
                    <input type="text" class="form-control input-sm" placeholder="Email" name="email" value="{{$var->email}}">
                    <i class="form-group__bar"></i>
                </div>
                <div class="form-group col-lg-6">
                    <label for="telefon">Telefon</label>
                    <input type="text" class="form-control input-sm" placeholder="Telefon" name="telefon" value="{{$var->telefon}}">
                    <i class="form-group__bar"></i>
                </div>
                <div class="row justify-content-center">
                    <div class="form-group">
                        <div class="text-center">
                            <button class="btn btn-warning" type="submit">
                                Izmeni podatke
                            </button>
                        </div>
                    </div>
                </div>
            {{ Form::close() }}
            </div>
        </div>
    </section>
@endsection
<!-- End SettingsController -->
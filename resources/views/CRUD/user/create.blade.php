@extends('layouts.adminLayout')

<!-- FormaZaUnosProjekata -->
@section('create')
    <section id="unosPostova">
        <div class="card col-lg-12">
            <div class="card-header">
                <div class="col-12">
                    <h4>{{$naslov}}</h4>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route($route['storeRoute'])}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">User name</label>
                        <input type="text" name="name" class="form-control"value="{{old('name')}}" >
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" value="{{old('email')}}">
                    </div>
                    <div class="form-group">
                        <label for="avatar">Ubaci sliku sliku</label>
                        <input type="file" name="avatar" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Lozinka</label>
                        <input type="password" name="password" class="form-control " value="{{old('password')}}">
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            @component('CRUD.komponente.submitGrupa')
                            @endcomponent
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
<!-- EndOfFormaZaUnosPostova -->
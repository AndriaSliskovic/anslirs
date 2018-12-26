@extends('layouts.adminLayout')

@section('create')
    <section id="napraviNoviMenu">
        <div class="card col-lg-9">
            <div class="card-header">
                <div class="col-12">
                    <h4>{{$naslov}}</h4>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('menu.store')}}" method="post" >
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="text" class="form-control input-sm" placeholder="Naziv menija" name="name">
                    <i class="form-group__bar"></i>
                </div>
                    <div class="form-group">
                        <input type="text" class="form-control input-sm" placeholder="Oblast" name="oblast_id">
                        <i class="form-group__bar"></i>
                    </div>
                <div class="form-group">
                    <input type="text" class="form-control input-sm" placeholder="Putanja" name="putanja">
                    <i class="form-group__bar"></i>
                </div>
                <div class="form-group">
                    @component('CRUD.komponente.submitGrupa')
                    @endcomponent
                </div>
                </form>
            </div>
        </div>
    </section>
@endsection
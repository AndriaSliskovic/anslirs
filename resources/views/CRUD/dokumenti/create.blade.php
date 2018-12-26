@extends('layouts.adminLayout')

@push('vendori_css')
    {{--SUMMERNOTE--}}
    <link rel="stylesheet" href="{{asset('admin/summernote-0.8.9-dist/summernote-bs4.css')}}">
    <link rel="stylesheet" href="{{asset('admin/summernote-0.8.9-dist/summernote.css')}}">
    {{--SELECT2--}}
    <link rel="stylesheet" href="{{asset('admin/vendors/bower_components/select2/dist/css/select2.min.css')}}">
@endpush

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
                {{--<form action="{{route($route['storeRoute'])}}" method="POST" enctype="multipart/form-data">--}}
                    {{Form::open(['route' =>[$route['storeRoute']], 'method' => 'POST','files'=>true])}}
                    {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Naslov</label>
                    <input type="text" name="name" class="form-control" >
                </div>
                <div class="form-group" >
                    <label for="opis">Opis dokumenta</label>
                    <textarea class="form-control textarea-autosize" placeholder="Ovde treba ubaciti sadrzaj projekta" style="overflow: hidden; word-wrap: break-word; height: 81px;" name="opis" id="summernote">
                    </textarea>
                </div>

                    <div class="row d-flex justify-content-around">
                        <div class="form-group">
                        {{Form::file('putanja')}}
                        </div>
                        <div class="form-group">
                            <label for="vremeIzrade">Vreme izrade</label>
                            <input type="date" name="vremeIzrade" class="form-control">
                        </div>
                        <div class="form-group">
                        {{Form::label('oblast', 'Izaberi oblast')}}
                            <div class="form-group">
                                <div class="select">
                                    {{Form::select('oblast_id',$oblast,null,['class'=>"form-control"])}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        @component('CRUD.komponente.submitGrupa')
                        @endcomponent
                    </div>
{{Form::close()}}
                {{--</form>--}}
            </div>
        </div>
    </section>

    @push('vendori_js')
        {{--<!-- include SUMMERNOTE css/js-->--}}
        <script src="{{asset('admin/vendors/bower_components/bootstrap/dist/js/bootstrap.js')}}"></script>
        <script src="{{asset('admin/summernote-0.8.9-dist/summernote.js')}}"></script>
        {{--SELECT2--}}
        <script src="{{asset('admin/vendors/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
    @endpush
    @push('skripte_js')
        {{--Summernote--}}
        <script>
            $(document).ready(function() {
                $('#summernote').summernote();
               //set the content to summernote using `code` attribute.
                $('#summernote').summernote('code', content);
            });
        </script>
    @endpush
@endsection
<!-- EndOfFormaZaUnosPostova -->
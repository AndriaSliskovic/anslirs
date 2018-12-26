@extends('layouts.adminLayout')
@push('vendori_css')
    {{--SUMMERNOTE--}}
    <link rel="stylesheet" href="{{asset('admin/summernote-0.8.9-dist/summernote-bs4.css')}}">
    <link rel="stylesheet" href="{{asset('admin/summernote-0.8.9-dist/summernote.css')}}">
    {{--SELECT2--}}
    <link rel="stylesheet" href="{{asset('admin/vendors/bower_components/select2/dist/css/select2.min.css')}}">
@endpush
@section('create')
    <section id="create">

        <div class="card col-lg-12">
            <!-- Card Header -->
            <div class="card-header row justify-content-between">
                <div class="col-8">
                    <h4>{{$naslov}}</h4>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route($route['storeRoute'])}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                    {{--<!-- Select tag -->--}}
                    <div class="form-group col-lg-6">
                        {{Form::label('sectCat', 'Izaberi kategoriju sekcije')}}
                        <div class="form-group">
                            <div class="select">
                                {{Form::select('sec_id',$sectCat,null,['class'=>"form-control"])}}
                            </div>
                        </div>
                    </div>
                    {{--<!-- Select tag -->--}}
                    <div class="form-group">
                        <input type="text" class="form-control input-sm" placeholder="Naslov" name="naslov" value="{{old('naslov')}}">
                        <i class="form-group__bar"></i>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control input-sm" placeholder="Podnaslov" name="podnaslov" value="{{old('naslov')}}">
                        <i class="form-group__bar"></i>
                    </div>
                    {{--Sadrzaj text area--}}
                    <div class="form-group col-lg-12" >
                        <label for="sadrzaj">Sadržaj sekcije</label>
                        <textarea class="form-control textarea-autosize" placeholder="Ovde treba ubaciti sadrzaj projekta" style="overflow: hidden; word-wrap: break-word; height: 81px;" name="sadrzaj" id="summernote">
                    </textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control input-sm" placeholder="Link" name="link" value="{{old('link')}}">
                        <i class="form-group__bar"></i>
                    </div>
                    {{--Ucitavanje slike--}}
                    <div class="form-group">
                        <label for="slika">Ubaci sliku</label>
                        <input type="file" name="slika" class="form-control">
                    </div>

                    <div class="form-group">
                        @component('CRUD.komponente.submitGrupa')
                        @endcomponent
                    </div>
                    </form>
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
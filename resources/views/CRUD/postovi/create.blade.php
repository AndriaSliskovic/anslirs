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
                <form action="{{route($route['storeRoute'])}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                    <div class="form-group">
                        <label for="naslov">Naslov</label>
                        <input type="text" name="naslov" class="form-control" >
                    </div>
                    <div class="form-group" >
                        <label for="sadrzaj">Sadržaj projekta</label>
                        <textarea class="form-control textarea-autosize" placeholder="Ovde treba ubaciti sadrzaj projekta" style="overflow: hidden; word-wrap: break-word; height: 81px;" name="sadrzaj" id="summernote">
                        {{--Sadrzaj text area--}}
                            {{--{!! $var->sadrzaj !!}--}}
                    </textarea>

                    </div>
                    <div class="row d-flex justify-content-around">
                        <div class="form-group">
                            <label for="skill">Skill</label>
                            <input type="number" name="skill" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="vremeIzrade">Vreme izrade</label>
                            <input type="date" name="vremeIzrade" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="slika">Ubaci sliku</label>
                        <input type="file" name="slika" class="form-control">
                    </div>
                    {{----}}
                    <div class="row">
                        {{--<!-- Select tag -->--}}
                        <div class="col-sm-3">
                            {{Form::label('category', 'Izaberi kategoriju')}}
                            <div class="form-group">
                                <div class="select">
                                    {{Form::select('category_id',$category,null,['class'=>"form-control"])}}
                                </div>
                            </div>
                        </div>
                        {{--<!-- Select tag -->--}}
                        <div class="col-sm-3">
                            {{Form::label('tip', 'Izaberi tip posta')}}
                            <div class="form-group">
                                <div class="select">
                                    {{Form::select('tipovi_id',$tip,null,['class'=>"form-control"])}}
                                </div>
                            </div>
                        </div>
                        {{--<!-- Select tag -->--}}
                        <div class="col-sm-3">
                            {{Form::label('user', 'Izaberi usera')}}
                            <div class="form-group">
                                <div class="select">
                                    {{Form::select('user_id',$user,null,['class'=>"form-control"])}}
                                </div>
                            </div>
                        </div>
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
<!-- EndOfFormaZaUnosPostova -->
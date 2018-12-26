@extends('layouts.adminLayout')

@push('vendori_css')
    {{--SUMMERNOTE--}}
    <link rel="stylesheet" href="{{asset('admin/summernote-0.8.9-dist/summernote-bs4.css')}}">
    <link rel="stylesheet" href="{{asset('admin/summernote-0.8.9-dist/summernote.css')}}">
    {{--SELECT2--}}
    <link rel="stylesheet" href="{{asset('admin/vendors/bower_components/select2/dist/css/select2.min.css')}}">
    @endpush

{{--<!-- FormaZaIzmenuProjekata -->--}}
@section('edit')
    <section id="editPostova">
        <div class="card col-lg-12">
            <div class="card-header">
                <div class="col-12">
                    <h4>{{$naslov}}</h4>
                </div>
            </div>
            <div class="card-body">
                {{--@method('PUT')--}}
                {{Form::model($var, ['route' =>[$route['updateRoute'], $var->id], 'method' => 'put','files'=>true])}}
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="naslov">Naslov</label>
                    <input type="text" name="naslov" class="form-control" value="{{$var->naslov}}">
                </div>
                <div class="form-group" >
                    <label for="sadrzaj">Sadržaj posta</label>
                    <textarea class="form-control textarea-autosize" placeholder="Ovde treba ubaciti sadrzaj projekta" style="overflow: hidden; word-wrap: break-word; height: 81px;" name="sadrzaj" id="summernote">
                        {{--Sadrzaj text area--}}
                        {!! $var->sadrzaj !!}
                    </textarea>

                </div>
                <div class="row d-flex justify-content-around">
                    <div class="form-group">
                        <label for="skill">Skill</label>
                        <input type="number" name="skill" class="form-control" value="{{$var->skill}}">
                    </div>
                    <div class="form-group">
                        <label for="vremeIzrade">Vreme izrade</label>
                        <input type="date" name="vremeIzrade" class="form-control" value="{{$var->vremeIzrade}}">
                    </div>
                </div>
                <div class="row">
                    {{--Ucitavanje nove slike--}}
                    <div class="form-group col-lg-4">
                        <label for="featured">Ubaci sliku</label>
                        <input type="file" name="slika" class="form-control">
                    </div>
                    {{--Prikaz slike--}}
                    <div class="form-group">
                        <img src="{{asset($var->slika)}}" alt="slika" class="rounded mx-auto d-block " style="width:128px;height:158px;margin-bottom: 5px; padding-bottom: 15px;" name="imagePreview"/>
                    </div>
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
                {{--</form>--}}
                {{ Form::close() }}
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
                //assign the variable passed from controller to a JavaScript variable.
                var content ={!! json_encode($var->sadrzaj)!!};

                //set the content to summernote using `code` attribute.
                $('#summernote').summernote('code', content);
            });
        </script>
    @endpush
@endsection
{{--<!-- EndOfFormaZaIzmenuProjekata -->--}}
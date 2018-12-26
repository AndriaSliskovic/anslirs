@extends('layouts.frontLayout')

@section('content')

    <section class="slider">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    @component('FRONT.komponente.caruselVeliki',[
                    'var'=>$carusel
                    ])
                    @endcomponent
                </div>
            </div>
        </div>
    </section>

    <!--Glavni sadrzaj-->
    <section class="mevent" id="kompanija">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-3 col-lg-3">
                    @component('FRONT.komponente.knjigUsluge',[
                    'var'=>$knjig
                    ])
                    @endcomponent
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6">
                    @component('FRONT.komponente.opstiDeo',[
                    'var'=>$kompanija
                    ])
                    @endcomponent
                </div>
                <div class="col-sm-12 col-md-3 col-lg-3">
                    @component('FRONT.komponente.softvUsluge',[
                    'var'=>$softver
                    ])
                    @endcomponent
                </div>
            </div>
        </div>
    </section>
    <!--/Glavni sadrzaj-->

    {{--Blogovi--}}
    <section id="blogovi">
        <div class="blog blog_two">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-8 col-lg-8 text-left">
                        <!-- Blogovi Veliki -->
                        <div class="top_box">
                        @component('FRONT.komponente.velikiBlog',[
                        'var'=>$opstiPost
                        ])
                        @endcomponent
                        </div>
                    </div>
                    <!-- Blog-Right -->
                    <div class="col-sm-12 col-md-4 col-lg-4 text-center">
                        <div class="rightblog">
                            <!-- About -->
                        @component('FRONT.komponente.about',[
                        'var'=>$direktor
                        ])
                        @endcomponent
                        <!-- Kategorije -->
                        @component('FRONT.komponente.kategorije',[
                        'kategorije'=>$kategorije
                        ])
                        @endcomponent
                        <!-- Vazni postovi -->
                        @component('FRONT.komponente.maliBlog',[
                        'var'=>$vazniPostovi
                        ])
                        @endcomponent
                        </div>
                    </div>
                    <!-- /Blog-Right -->
                </div>
            </div>
        </div>
    </section>

@endsection
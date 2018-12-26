@extends('layouts.frontLayout')

@section('content')
<section id="dokumenti">
    <div class="blog">
        <div class="container">
            <div class="row">
                <!--============ Blog-Left ============-->
                <div class="col-sm-12 col-md-8 col-lg-8">
                    <div class="bleft">
                        @component('FRONT.komponente.tabelaDokumenti',[
                            'var'=>$dokumenti,
                            'oblast'=>$oblast
                        ])
                        @endcomponent
                        <hr>
                    </div>
                    <!-- /Blogovi Veliki -->
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
@extends('layouts.frontLayout')

@section('content')

<!--============ Breadcrumb ============-->
<section class="callaction">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h2>{{$naslov}}</h2>
            </div>
        </div>
    </div>
</section>
<!--============ /Breadcrumb ============-->

<!--============ Blog ============-->
<div class="blog">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-9 col-lg-9 padded">
                <!--============ Blog ============-->

                @component('FRONT.komponente.srednjiBlogAll',[
                    'var'=>$post
                ])
                    @endcomponent

            <!-- Desni side bar -->

            </div>
            <!-- Blog-Right -->
            <div class="col-sm-12 col-md-3 col-lg-3 text-center">
                <div class="rightblog">
                    <!-- About -->

                    @component('FRONT.komponente.about',[
                        'var'=>$direktor
                    ])
                        @endcomponent

                @component('FRONT.komponente.kategorije',[
                'kategorije'=>$kategorije
                ])
                @endcomponent
                <!-- Vazni postovi -->
<!--                    --><?php
//                    include_once '../Komponente/maliBlog.php';
//                    ?>
                    @component('FRONT.komponente.maliBlog',[
                    'var'=>$vazniPostovi
                    ])
                        @endcomponent
                </div>
            </div>
        </div>
        <!-- /Blog-Right -->
    </div>
</div>

    @endsection
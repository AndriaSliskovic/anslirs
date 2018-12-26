@extends('layouts.frontLayout')

@section('content')

<div class="blog blog_two">
    <div class="container">
        <div class="row">

            <!--============ Blog-Left ============-->

<!--        --><?php
//        include_once '../Komponente/velikiBlogSingle.php';
//        ?>
            @component('FRONT.komponente.velikiBlogSingle',[
            'post'=>$post
            ])
                @endcomponent
        <!--============ /Blog-Left ============-->
            <!-- Blog-Right -->
            <div class="col-sm-12 col-md-4 col-lg-4 text-center">
                <div class="rightblog">
                    <!-- About -->
                @component('FRONT.komponente.about1',[
                'var'=>$user
                ])
                @endcomponent
                <!-- Kategorije -->
<!--                --><?php
//                include_once '../Komponente/kategorije.php';
//                ?>
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

        </div>
    </div>
</div>
    @endsection
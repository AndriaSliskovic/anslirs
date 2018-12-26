@extends('layouts.frontLayout')

@section('content')
<section class="inslide">
    <div class="callaction">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <p>{{$softversadrzaj->podnaslov}}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Softver -->
<section class="contact" id="aboutSoftver">
    <div class="container">
        {{--SOFTVER--}}
        <div class="row">
            <div class="col-sm-12 col-md-4 col-lg-4 text-left">
                {!! $softversadrzaj->sadrzaj !!}
            </div>
            <!-- Profili -->
            <div class="col-sm-12 col-md-8 col-lg-8 text-center">
                <div class="head callaction"><h6>{{$softversadrzaj->naslov}}</h6></div>
                {{--Prvi red--}}
                <div class="row">
                    @foreach($softverTim as $tim)
                    <div class="col-xs-12 col-sm-4 col-lg-6 text-center">
                        <div class="rightblog">

                            @component('FRONT.komponente.tim',[
                            'var'=>$tim
                            ])
                                @endcomponent

                        </div>
                    </div>
                    @endforeach
                </div>
                {{--Drugi red--}}
                <div class="row">
                    @foreach($softverSaradnici as $tim)
                    <div class="col-xs-6 col-sm-6 col-lg-3 text-center">
                        <div class="rightblog">
                            @component('FRONT.komponente.tim',[
                            'var'=>$tim
                            ])
                            @endcomponent
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /Softver -->

    {{--Knjigovodstvo--}}
<section class="inslide">
    <div class="callaction">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <p>{{$knjigovodstvoSadrzaj->podnaslov}}</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="contact" id="aboutSoftver">
    <div class="container">
        {{--SOFTVER--}}
        <div class="row">
            <div class="col-sm-12 col-md-4 col-lg-4 text-left">
                {!! $knjigovodstvoSadrzaj->sadrzaj !!}
            </div>
            <!-- Profili -->
            <div class="col-sm-12 col-md-8 col-lg-8 text-center">
                <div class="head callaction"><h6>{{$knjigovodstvoSadrzaj->naslov}}</h6></div>
                {{--Prvi red--}}
                <div class="row">
                    @foreach($knjigovodstvoTim as $tim)
                        <div class="col-xs-12 col-sm-4 col-lg-6 text-center">
                            <div class="rightblog">

                                @component('FRONT.komponente.tim',[
                                'var'=>$tim
                                ])
                                @endcomponent

                            </div>
                        </div>
                    @endforeach
                </div>
                {{--Drugi red--}}
                <div class="row">
                    @foreach($strucniSaradnici as $tim)
                        <div class="col-xs-6 col-sm-6 col-lg-3 text-center">
                            <div class="rightblog">
                                @component('FRONT.komponente.tim',[
                                'var'=>$tim
                                ])
                                @endcomponent
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
<!-- /Agencija -->
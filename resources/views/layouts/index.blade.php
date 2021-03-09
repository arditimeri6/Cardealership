@extends('layouts.layout')

@section('theme-content')
        @if(session('Subscribed'))
            <script>
                toastr.success('{{ session('Subscribed') }}', {timeOut:5000})
            </script>
        @endif
        @if(session('notSubscribed'))
            <script>
                toastr.error('{{ session('notSubscribed') }}', {timeOut:5000})
            </script>
        @endif
        <div id="rev_slider-wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="classicslider1" >
            <div class="tp-banner-container">
                <div class="tp-banner" >
                    <ul>
                    @foreach($sliders as $key => $slider)
                            <li data-transition="fade" data-slotamount="7" data-masterspeed="2000"
                                data-saveperformance="on"  data-title="Ken Burns Slide">
                                <!-- MAIN IMAGE -->
                                <img src="{{ url('uploads/' . $slidersPhotos[$key]) }}"  alt="2" data-lazyload="{{ url('uploads/' . $slidersPhotos[$key]) }}"
                                    data-bgposition="center" data-kenburns="off" data-duration="12000"
                                    data-ease="Power0.easeInOut" data-bgfit="115" data-bgfitend="100"
                                    data-bgpositionend="center bottom">
                                <div class="tp-caption tentered_white_huge lft tp-resizeme"
                                    data-endspeed="300" data-easing="Power4.easeOut" data-start="400" data-speed="600"
                                    data-y="130" data-hoffset="0" data-x="center"
                                    style="">
                                    <!-- <img alt="" src="img/4.png" style="width: 110px; height: 110px;"> -->
                                </div>
                                <div class="tp-caption tentered_white_huge lft tp-resizeme"
                                    data-endspeed="300" data-easing="Power4.easeOut" data-start="400" data-speed="600"
                                    data-y="272" data-hoffset="0" data-x="center"
                                    style="color: #fff; text-transform: uppercase; font-size: 40px; letter-spacing: 6px;
                                    font-weight: 400;">
                                    {{ $slider->manufacturer }} {{ $slider->model }}
                                </div>
                                <div class="tp-caption tentered_white_huge lfb tp-resizeme" data-endspeed="300"
                                    data-easing="Power4.easeOut" data-start="800" data-speed="600" data-y="320"
                                    data-hoffset="0" data-x="center"
                                    style="color: #fff; font-size: 13px; text-transform: uppercase; letter-spacing: 10px;">
                                    <!-- <i class="fa fa-map-marker"> </i> Not caroliana 234 -->
                                </div>
                                <div class="tp-caption tentered_white_huge lft tp-resizeme"
                                    data-endspeed="300" data-easing="Power4.easeOut" data-start="400" data-speed="600"
                                    data-y="365" data-hoffset="0" data-x="center"
                                    style="color: #fff; text-transform: uppercase; font-size: 40px; letter-spacing: 6px;
                                    font-family: Montserrat; font-weight: 400;">
                                    £ {{ $slider->price }}
                                </div>
                                <a href="{{ route('details', $slider->id) }}" class="pull-left tp-caption lfb tp-resizeme rs-parallaxlevel-0"
                                data-x="center"
                                data-y="420"
                                data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;
                                scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                data-speed="500"
                                data-start="1200"
                                data-easing="Power3.easeInOut"
                                data-splitin="none"
                                data-splitout="none"
                                data-elementdelay="0.1"
                                data-endelementdelay="0.1"
                                data-linktoslide="next"
                                style="z-index: 12; max-width: auto; max-height: auto; white-space: nowrap;padding:15px 28px;
                                color: #fff;text-transform: uppercase;
                                border: none; background:#000;
                                font-size: 12px; letter-spacing: 3px;
                                font-family: Montserrat; border-radius: 0px;
                                display: table; transition: .4s;">More Details</a>

                            </li>
                        @endforeach

                    </ul>
                    <div class="tp-bannertimer"></div>
                </div>
            </div>
        </div><!-- END REVOLUTION SLIDER -->

        <section class="horizontal-search">
            <div class="container">
                <h1 class="nocontent outline">--- Search form  ---</h1>
                <div class="">
                    <div class="search-form">
                        <form action="{{ route('search') }}"  method="post" class="form-inline">
                            @csrf
                            <div class="search-form-content" style="width: 100%;">
                                <div class="search-form-field">
                                    <div class="form-group col-xs-12 col-sm-3 col-md-3">
                                        <div class="label-select">
                                            <select class="form-control input-lg dynamic" name="c_manufacturer" data-dependent="c_model">
                                                <option value="">Manufacturers</option>
                                                @foreach($manufacturers as $manufacturer)
                                                    <option value="{{ $manufacturer->id }}">{{ $manufacturer->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-xs-12 col-sm-3 col-md-3">
                                        <div class="label-select">
                                            <select class="form-control input-lg" name="c_model" id="c_model">
                                                <option value="">Models</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-xs-12 col-sm-3 col-md-3">
                                        <div class="label-select">
                                            <select class="form-control" name="c_year">
                                                <option value="">Year</option>
                                                @foreach($years as $year)
                                                    <option value="{{ $year->year }}">{{ $year->year }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-xs-12 col-sm-3 col-md-3">
                                        <div class="label-select">
                                            <select class="form-control" name="c_condition">
                                                <option value="">Condition</option>
                                                    @foreach($conditions as $condition)
                                                        <option value="{{ $condition->id }}">{{ $condition->name }}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-xs-12 col-sm-3 col-md-3">
                                    </div>
                                    <div class="form-group col-xs-12 col-sm-3 col-md-3">
                                        <span class="gprice-label">Price Range</span>
                                        <input name="price" type="text" class="span2" value="" data-slider-min="0"
                                            data-slider-max="150000" data-slider-step="5"
                                            data-slider-value="[0,150000]" id="price-range" >
                                    </div>
                                    <div class="form-group col-xs-12 col-sm-3 col-md-3">
                                        <span class="garea-label">Mileage Range</span>
                                        <input name="mileage" type="text" class="span2" value="" data-slider-min="0"
                                            data-slider-max="300000" data-slider-step="5"
                                            data-slider-value="[0,300000]" id="vehicul-geo" >
                                    </div>
                                </div>
                            </div>
                            <div class="search-form-submit">
                                <button type="submit" class="btn-search">Search</button>
                            </div>
                        </form>
                    </div><!-- Services Sec -->

                </div>
            </div>
        </section>

        <section class="block remove-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="heading4">
                            <h2>RECENT VEHICLES </h2>
                            <span>See the latest added vehicles</span>
                        </div>
                        <div class="vehiculs-sec">
                            <div class="carousel-prop">
                                @foreach($cars as $key => $car)
                                    <div class="vehiculs-box">
                                        <div class="vehiculs-thumb">
                                            <img src="{{ url('uploads/' . $photos[$key]) }}" alt="" />
                                            <span class="spn-status"> {{ $car->condition }}</span>
                                            <!-- <span class="spn-save"> <i class="ti ti-heart"></i> </span> -->

                                            <a title="Details" class="proeprty-sh-more" href="{{ route('details', $car->id) }}"><i class="fa fa-angle-double-right"> </i><i class="fa fa-angle-double-right"> </i></a>
                                            <p class="car-info-smal">
                                                Registration {{ $car->year }}<br>
                                                {{ $car->cylinder }} {{ $car->fuel_type }}<br>
                                                {{ $car->hp }} HP<br>
                                                {{ $car->body_type }}<br>
                                                {{ $car->mileage }} Miles
                                            </p>
                                        </div>
                                        <h3><a href="{{ route('details', $car->id) }}" title="{{ $car->manufacturer }} {{ $car->model }}">{{ $car->manufacturer }} {{ $car->model }}</a></h3>
                                        <span class="price">£{{ $car->price }}</span>
                                    </div>
                                @endforeach
                            </div><!-- Carousel -->

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="block">
            <div style="background: url(img/call-to-action-bg.jpg) repeat scroll 50% 422.28px transparent; background-attachment: fixed;" class="parallax scrolly-invisible  blackish"></div><!-- PARALLAX BACKGROUND IMAGE -->
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="vehiculs-text-bar">
                            <h3>Contact us about <span> anything </span> ! </h3>
                            <p>Anything that you want to know about us or our cars <br/> you can write us an email and we will respond quickly</p>
                            <a href="{{ route('contact') }}" title="" class="flat-btn">Contact us</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="block">
            <div class="container">
                <div class="heading4">
                    <h2>FEATURED VEHICLES</h2>
                    <span>See the best cars</span>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="vehiculs-sec">
                            <div class="row">
                                @foreach($featured as $key => $feature)
                                    <div class="col-md-4">
                                        <div class="vehiculs-box">
                                            <div class="vehiculs-thumb">
                                                <img src="{{ url('uploads/' . $featuredPhotos[$key]) }}" alt="" />
                                                <span class="spn-status"> {{ $feature->condition }} </span>
                                                <a class="proeprty-sh-more" href="{{ route('details', $feature->id) }}"><i class="fa fa-angle-double-right"> </i><i class="fa fa-angle-double-right"> </i></a>
                                                <p class="car-info-smal">
                                                    Registration {{ $feature->year }}<br>
                                                    {{ $feature->cylinder }} {{ $feature->fuel_type }}<br>
                                                    {{ $feature->hp }} HP<br>
                                                    {{ $feature->body_type }}<br>
                                                    {{ $feature->mileage }} Miles
                                                </p>
                                            </div>
                                            <h3><a href="{{ route('details', $feature->id) }}" title="">{{ $feature->manufacturer }} {{ $feature->model }}</a></h3>
                                            <span class="price">£{{ $feature->price }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

@endsection


@section('theme-script')
<script type="text/javascript">
        $(document).ready(function () {
            "use strict";
            jQuery('.tp-banner').show().revolution({
                dottedOverlay: "none",
                delay: 10000,
                startwidth: 1170,
                startheight: 700,
                hideThumbs: 200,
                thumbWidth: 100,
                thumbHeight: 50,
                thumbAmount: 5,
                navigationType: "bullet",
                navigationArrows: "solo",
                navigationStyle: "preview1",
                touchenabled: "on",
                onHoverStop: "on",
                swipe_velocity: 0.7,
                swipe_min_touches: 1,
                swipe_max_touches: 1,
                drag_block_vertical: false,
                parallax: "mouse",
                parallaxBgFreeze: "on",
                parallaxLevels: [7, 4, 3, 2, 5, 4, 3, 2, 1, 0],
                keyboardNavigation: "off",
                navigationHAlign: "center",
                navigationVAlign: "bottom",
                navigationHOffset: 0,
                navigationVOffset: 20,
                soloArrowLeftHalign: "left",
                soloArrowLeftValign: "center",
                soloArrowLeftHOffset: 20,
                soloArrowLeftVOffset: 0,
                soloArrowRightHalign: "right",
                soloArrowRightValign: "center",
                soloArrowRightHOffset: 20,
                soloArrowRightVOffset: 0,
                shadow: 0,
                fullWidth: "on",
                fullScreen: "off",
                spinner: "spinner4",
                stopLoop: "off",
                stopAfterLoops: -1,
                stopAtSlide: -1,
                shuffle: "off",
                autoHeight: "off",
                forceFullWidth: "off",
                hideThumbsOnMobile: "off",
                hideNavDelayOnMobile: 1500,
                hideBulletsOnMobile: "off",
                hideArrowsOnMobile: "off",
                hideThumbsUnderResolution: 0,
                hideSliderAtLimit: 0,
                hideCaptionAtLimit: 0,
                hideAllCaptionAtLilmit: 0,
                startWithSlide: 0,
                videoJsPath: "rs-plugin/videojs/",
                fullScreenOffsetContainer: ""
            });

            $(".carousel-prop").owlCarousel({
                autoplay: true,
                autoplayTimeout: 3000,
                smartSpeed: 2000,
                loop: true,
                dots: true,
                nav: false,
                items: 4,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: false
                    },
                    600: {
                        items: 2,
                        nav: false
                    },
                    1000: {
                        items: 3,
                        nav: true,
                        loop: false
                    }
                }
            });

            $(".carousel").owlCarousel({
                autoplay: true,
                autoplayTimeout: 3000,
                smartSpeed: 2000,
                loop: false,
                dots: false,
                nav: true,
                margin: 0,
                items: 3
            });

            $(".carousel-client").owlCarousel({
                autoplay: true,
                autoplayTimeout: 3000,
                smartSpeed: 2000,
                loop: false,
                dots: false,
                nav: true,
                margin: 30,
                items: 5,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: true
                    },
                    600: {
                        items: 3,
                        nav: true
                    },
                    1000: {
                        items: 5,
                        nav: true,
                        loop: false
                    }
                }
            });
            $('.dynamic').change( function() {
                // console.log($('input[name="_token"]').val())
                if($(this).val() != ''){
                    var select = $(this).attr('id');
                    var value = $(this).val();
                    var dependent = $(this).data('dependent');
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url:"{{ route('model.search') }}",
                        method: "POST",
                        data: {
                            select:select,
                            value:value,
                            _token:_token,
                            dependent:dependent,
                        },
                        success: function(result) {
                            $('#'+dependent).html(result);
                        },

                    })
                }
            });
        });
    </script>
@endsection

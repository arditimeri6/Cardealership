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
    <div class="inner-head overlap">
        <div style="background: url('{{ asset('img/parallax1.jpg') }}')  repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible"></div><!-- PARALLAX BACKGROUND IMAGE -->
        <div class="container">
            <div class="inner-content">
                <span><i class="ti ti-home"></i></span>
                <h2>{{ $car->manufacturer }} {{ $car->model }}</h2>
                <ul>
                    <li><a href="{{ route('index') }}" title="">HOME</a></li>
                    <li style="color:white">{{ $car->manufacturer }} {{ $car->model }}</li>
                </ul>
            </div>
        </div>
    </div><!-- inner Head -->
    @if(session('successDetailsContact'))
        <script>
            toastr.success('{{ session('successDetailsContact') }}', {timeOut:5000})
        </script>
    @endif
    <section class="block">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-8 column">
                            <div class="single-post-sec">
                                <div class="blog-post vehicul-post">
                                    <div class="vehicul-gallery">
                                        <div class="light-slide-item">
                                            <div class="favorite-and-print">
                                                <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
                                                    @foreach($images as $image)
                                                        <li data-thumb="{{ url('uploads/' . $image) }}">
                                                            <img class="detailsImages" src="{{ url('uploads/' . $image) }}" alt="Cars" />
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <h1>Price :  £{{ $car->price }}</h1>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="vehicul-detail">

                                                <div class="detail-field row" >
                                                    <div class="col-md-4">
                                                        <span class="col-xs-6 col-md-6 detail-field-label">Manufacturer</span>
                                                        <span class="col-xs-6 col-md-6 detail-field-value">{{ $car->manufacturer }}</span>
                                                        <span class="col-xs-6 col-md-6 detail-field-label">Model</span>
                                                        <span class="col-xs-6 col-md-6 detail-field-value">{{ $car->model }}</span>
                                                        <span class="col-xs-6 col-md-6 detail-field-label">Body Type</span>
                                                        <span class="col-xs-6 col-md-6 detail-field-value">{{ $car->body_type }}</span>
                                                        <span class="col-xs-6 col-md-6 detail-field-label">Fuel Type</span>
                                                        <span class="col-xs-6 col-md-6 detail-field-value">{{ $car->fuel_type }}</span>
                                                        <span class="col-xs-6 col-md-6 detail-field-label">Transmission</span>
                                                        <span class="col-xs-6 col-md-6 detail-field-value">{{ $car->transmission }}</span>
                                                        <span class="col-xs-6 col-md-6 detail-field-label">Mileage</span>
                                                        <span class="col-xs-6 col-md-6 detail-field-value">{{ $car->mileage }} mi</span>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <span class="col-xs-6 col-md-6 detail-field-label">Doors</span>
                                                        <span class="col-xs-6 col-md-6 detail-field-value">{{ $car->door }}</span>
                                                        <span class="col-xs-6 col-md-6 detail-field-label">Cylinders</span>
                                                        <span class="col-xs-6 col-md-6 detail-field-value">{{ $car->cylinder }}</span>
                                                        <span class="col-xs-6 col-md-6 detail-field-label">HP / KW</span>
                                                        <span class="col-xs-6 col-md-6 detail-field-value">{{ $car->hp }}</span>
                                                        <span class="col-xs-6 col-md-6 detail-field-label">Color</span>
                                                        <span class="col-xs-6 col-md-6 detail-field-value">{{ $car->color }}</span>
                                                        <span class="col-xs-6 col-md-6 detail-field-label">VIN</span>
                                                        <span class="col-xs-6 col-md-6 detail-field-value"><span style="font-size:12px;">{{ $car->vin_number }}</span></span>
                                                        <span class="col-xs-6 col-md-6 detail-field-label">CO2 Emission</span>
                                                        <span class="col-xs-6 col-md-6 detail-field-value">{{ $car->co2_emission }}</span>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <span class="col-xs-6 col-md-6 detail-field-label">Origin</span>
                                                        <span class="col-xs-6 col-md-6 detail-field-value">{{ $car->origin }}</span>
                                                        <span class="col-xs-6 col-md-6 detail-field-label">Registration</span>
                                                        <span class="col-xs-6 col-md-6 detail-field-value">{{ $car->registration }}</span>
                                                        <span class="col-xs-6 col-md-6 detail-field-label">Year</span>
                                                        <span class="col-xs-6 col-md-6 detail-field-value">{{ $car->year }}</span>
                                                        <span class="col-xs-6 col-md-6 detail-field-label">First Registration</span>
                                                        <span class="col-xs-6 col-md-6 detail-field-value">{{ $car->first_registration }}</span>
                                                        <span class="col-xs-6 col-md-6 detail-field-label">Condition</span>
                                                        <span class="col-xs-6 col-md-6 detail-field-value">{{ $car->condition }}</span>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:50px;">
                                        <div class="col-md-12">
                                            <div class="heading3">
                                                <h2>Description </h2>
                                            </div>
                                            <p>{{$car->description}}</p>
                                        </div>
                                    </div>
                                    <div class="vehicul-video">
                                        <div class="heading3">
                                            <h2>Equipment </h2>
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            <div class="col-md-12">
                                                @foreach($equipments as $equipment)
                                                    <li class="list-group-item">{{$equipment->equipment}} <span style="color:green"><i class="fa fa-check"></i></span></li>
                                                @endforeach
                                            </div>
                                        </ul>
                                    </div>

                                    <div class="send-email-to-agent">
                                        <div class="comment-form">
                                            <div class="heading3">
                                                <h2>Send Message for this Car</h2>
                                            </div>
                                            <form method="post" action="{{ route('send.mail.for.car', $car->id) }}">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label>
                                                            <i class="fa fa-user"></i>
                                                            <input type="text" name="name" placeholder="Name" />
                                                        </label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label>
                                                            <i class="fa fa-at"></i>
                                                            <input type="email" name="email" placeholder="Email" />
                                                        </label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label>
                                                            <i class="fa fa-phone"></i>
                                                            <input type="text" name="phone" placeholder="Phone Number" />
                                                        </label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label>
                                                            <i class="fa fa-pencil"></i>
                                                            <textarea name="comment" placeholder="Your Message"></textarea>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <button type="submit" class="flat-btn">SEND MESSAGE</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                </div><!-- Blog Post -->
                            </div><!-- Blog POst Sec -->
                        </div>
                        <aside class="col-md-4 column">
                            <!-- <div class="agent_bg_widget widget">
                                <div class="agent_widget">
                                    <div class="agent_pic">
                                        <a href="agent.html" title="">
                                            <img src="img/demo/man1.jpg" alt="" />
                                            <h3 class="nocontent outline">--- document outline needed 3 ---</h3>
                                            <h4>Smith forbes</h4>
                                        </a>
                                    </div>
                                    <div class="agent_social">
                                        <a href="#" title=""><i class="fa fa-facebook"></i></a>
                                        <a href="#" title=""><i class="fa fa-google-plus"></i></a>
                                        <a href="#" title=""><i class="fa fa-twitter"></i></a>
                                        <a href="#" title=""><i class="fa fa-tumblr"></i></a>
                                    </div>
                                    <span>
                                        <i class="fa fa-phone"> </i> +1 9090909090
                                    </span>
                                    <span>
                                        <i class="fa fa-envelope"> </i> agent@company.com
                                    </span>
                                    <a href="agent.html"  title="" class="btn contact-agent">Find more</a>
                                </div>
                            </div> -->
                            <!-- Follow Widget -->

                            <div class="search_widget widget">
                                <div class="heading2">
                                    <h3>SEARCH VEHICULS</h3>
                                </div>
                                <div class="search-form">
                                    <form action="{{ route('search') }}"  method="post" class="form-inline">
                                        @csrf
                                        <div class="search-form-content" >
                                            <div class="search-form-field">
                                                <div class="form-group col-md-12 col-xs-12">
                                                    <div class="label-select">
                                                        <select class="form-control input-lg dynamic" name="c_manufacturer" data-dependent="c_model">
                                                            <option value="">Manufacturers</option>
                                                            @foreach($manufacturers as $manufacturer)
                                                                <option value="{{ $manufacturer->id }}">{{ $manufacturer->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-12 col-xs-12">
                                                    <div class="label-select">
                                                        <select class="form-control input-lg" name="c_model" id="c_model">
                                                            <option value="">Models</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-12 col-xs-12">
                                                    <div class="label-select">
                                                        <select class="form-control" name="c_year">
                                                            <option value="">Year</option>
                                                            @foreach($years as $year)
                                                                <option value="{{ $year->year }}">{{ $year->year }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-12 col-xs-12">
                                                    <div class="label-select">
                                                        <select class="form-control" name="c_condition">
                                                            <option value="">Condition</option>
                                                                @foreach($conditions as $condition)
                                                                    <option value="{{ $condition->id }}">{{ $condition->name }}</option>
                                                                @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-12 col-xs-12">
                                                    <span class="gprice-label">Price Range</span>
                                                    <input name="price" type="text" class="span2" value="" data-slider-min="0"
                                                        data-slider-max="150000" data-slider-step="5"
                                                        data-slider-value="[0,150000]" id="price-range" >
                                                </div>
                                                <div class="form-group col-md-12 col-xs-12">
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
                            </div><!-- Category Widget -->
                        </aside>
                    </div>

                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="related-vehiculs-">
                                    <div class="heading3">
                                        <h3>RELATED VEHICULS {{ ($relates->count() == 0) ? '(No data available)' : '' }}</h3>
                                        <!-- <span>Lorem ipsum dolor amet</span> -->
                                    </div>
                                    <div class="vehiculs-sec">
                                        <div class="carousel-prop">
                                            @foreach($relates as $key => $related)
                                                <div class="vehiculs-box">
                                                    <div class="vehiculs-thumb">
                                                        <img src="{{ url('uploads/' . $relatedPhotos[$key]) }}" alt="" />
                                                        <span class="spn-status"> {{ $related->condition }}</span>
                                                        <!-- <span class="spn-save"> <i class="ti ti-heart"></i> </span> -->

                                                        <a title="Details" class="proeprty-sh-more" href="{{ route('details', $related->id) }}"><i class="fa fa-angle-double-right"> </i><i class="fa fa-angle-double-right"> </i></a>
                                                        <p class="car-info-smal">
                                                            Registration {{ $related->year }}<br>
                                                            {{ $related->cylinder }} {{ $related->fuel_type }}<br>
                                                            {{ $related->hp }} HP<br>
                                                            {{ $related->body_type }}<br>
                                                            {{ $related->mileage }} Miles
                                                        </p>
                                                    </div>
                                                    <h3><a href="{{ route('details', $related->id) }}" title="{{ $related->manufacturer }} {{ $related->model }}">{{ $related->manufacturer }} {{ $related->model }}</a></h3>
                                                    <span class="price">£{{ $related->price }}</span>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Related Posts -->

                </div>
            </div>
        </div>
    </section>
@endsection

@section('theme-script')
<script>
    $(document).ready(function () {
        $('#image-gallery').lightSlider({
            gallery: true,
            item: 1,
            thumbItem: 10,
            slideMargin: 0,
            speed: 2000,
            pause: 4000,
            auto: true,
            loop: true,
            onSliderLoad: function () {
                $('#image-gallery').removeClass('cS-hidden');
            }
        });
    });
    $(document).ready(function () {
        "use strict";

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

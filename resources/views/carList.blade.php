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
            <div style="background: url(img/parallax1.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
            <div class="container">
                <div class="inner-content">
                    <span><i class="fa fa-bolt"></i></span>
                    <h2>CAR CATALOG ({{$count}})</h2>
                    <ul>
                        <li><a href="{{ route('index') }}" title="">HOME</a></li>
                        <li><a href="#" title="">CAR CATALOG</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- inner Head -->

        <section class="horizontal-search pm-extra ">
            <div class="container">

                   <h1 class="nocontent outline">--- Search form ---</h1>
                <div class="">
                    <!-- <div class="col-md-10 offset-md-1"> -->
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
                <!-- </div> -->
            </div>
        </section>
        <br>  <br>

        <section class="block remove-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="blog-sec">
                            <div class="row">
                                @foreach($cars as $key => $car)
                                    <div class="col-md-6">
                                        <div class="vehicul-post">
                                            <div class="vehicul-thumb">
                                                <img src="{{ url('uploads/' . $photos[$key]) }}" alt="" />
                                                <div class="vehicul-post-detail">
                                                    <h4 class="condition" @if($car->condition == "Used") style="color:#fff;" @else style="color:#ff2929;" @endif>{{ $car->condition }}</h4>
                                                    <h2><a href="{{ route('details', $car->id) }}" title="{{ $car->manufacturer }} {{ $car->model }}">{{ $car->manufacturer }} {{ $car->model }}</a></h2>
                                                    <h2 class="price"> £{{ $car->price }} </h2>
                                                    <span><i class="fa fa-calendar-o"></i> {{ $date[$key] }}</span>
                                                    <p>Registration {{ $car->year }} <br>
                                                    {{ $car->cylinder }} {{ $car->fuel_type }}<br>
                                                    {{ $car->hp }} HP<br>
                                                    {{ $car->body_type }}<br>
                                                    {{ $car->mileage }} Miles</p>

                                                    <a href="{{ route('details', $car->id) }}" title="" class="vehicul-more">Details </a>
                                                </div>
                                            </div>
                                            <div class="vehicul-agent ">
                                                <!-- <a href="agent3.html" title="">
                                                    <img src="img/3.png" alt="" />
                                                    <h3>KwitaraCars y</h3>
                                                    <span>Posted by <i>Agent Flwo</i></span>
                                                </a> -->
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                {{ $cars->links('pagination') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection

@section('theme-script')
<script>
    $(document).ready(function () {
        "use strict";

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

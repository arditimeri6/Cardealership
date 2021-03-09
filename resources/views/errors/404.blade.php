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
        <div style="background: url(/img/parallax1.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div>
        <!-- PARALLAX BACKGROUND IMAGE -->	
        <div class="container">
            <div class="inner-content">
                <span><i class="fa fa-bolt"></i></span>
                <h2>404 ERROR</h2>
                <ul>
                    <li><a href="{{ route('index') }}" title="">HOME</a></li>
                    <li><a href="#" title="">404 ERROR</a></li>
                </ul>
            </div>
        </div>
    </div><!-- inner Head -->
    <section class="block">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="error-sec">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="error-not-found style2">
                                    <span>Sorry the Page you are looking fot does not exist here</span>
                                    <h3>404<strong>ERROR !</strong></h3>
                                    <h4>You can Explore Our Website Back <br/>to the Navigation Below</h4>
                                    <ul>
                                        <li><a href="{{ route('index') }}" title="">HOME</a></li>
                                        <li><a href="{{ route('car.list') }}" title="">CAR CATALOG</a></li>
                                        <!-- <li><a href="#" title="">ABOUT US</a></li> -->
                                        <li><a href="{{ route('contact') }}" title="">CONTACT</a></li>
                                    </ul>
                                </div>
                            </div>
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

            $(function () {
                var foo = $('.gallery-box');
                foo.poptrox({
                    usePopupCaption: true
                });
            });
        });
</script>
@endsection
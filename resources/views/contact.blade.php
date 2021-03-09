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
        <div  style="background: url(img/parallax1.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
        <div class="container">
            <div class="inner-content">
                <span><i class="fa fa-bolt"></i></span>
                <h2>CONTACT US</h2>
                <ul>
                    <li><a href="#" title="">HOME</a></li>
                    <li><a href="#" title="">CONTACT US</a></li>
                </ul>
            </div>
        </div>
    </div><!-- inner Head -->
    @if(session('successContact'))
        <script>
            toastr.success('{{ session('successContact') }}', {timeOut:5000})
        </script>
    @endif

    <section class="block">
        <div class="container">
                <h1 class="nocontent outline">--- email+phone ---</h1>
            <div class="row">
                <div class="col-md-12">
                    <div class="contact-lists-sec">
                        <ul>
                            <li>
                                <i class="fa fa-phone"></i>+44 7737 041505
                            </li>
                            <li>
                                <i class="fa fa-at"></i>bekocarssale@gmail.com
                            </li>
                            <li>
                                <i class="fa fa-support"></i>Get Free Support  24/7
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="block remove-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading4 contact-us-heading">
                        <h2>CONTACT US</h2>
                        <!-- <span>Lorem ipsum dolor</span> -->
                    </div>
                    <div class="contact-page-sec">
                        <div class="row">
                            <div class="col-md-6 column">
                                <div class="contact-form">
                                    <form method="post" action="{{ route('send.mail') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <i class="fa fa-user"></i>
                                                <input type="text" name="name" placeholder="Name">
                                            </div>
                                            <div class="col-md-12">
                                                <i class="fa fa-at"></i>
                                                <input type="text" name="email" placeholder="Email">
                                            </div>
                                            <div class="col-md-12">
                                                <i class="fa fa-pencil"></i>
                                                <textarea name="comment" placeholder="Message"></textarea>
                                            </div>
                                            <div class="col-md-12">
                                                <button class="flat-btn" type="submit">SEND NOW</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-6 column">
                                <div class="contact-details">
                                    <div class="contact-infos">
                                        <ul>
                                            <li>
                                                <span><i class="fa fa-map-marker"></i> Address</span>
                                                <p>Weydown Industrial Estate <br>
                                                Weydown Road (opposite Jewson and Clement) <br>
                                                Haslemere GU27 1DB England </p>
                                            </li>
                                            <li>
                                                <span><i class="fa fa-fax"></i> Fax/Email</span>
                                                <p>+44 7737 041505<br>bekocarssale@gmail.com</p>
                                            </li>
                                        </ul>
                                    </div>
                                    <ul class="social-btns">
                                        <li><a title="Facebook" target="_blank" href="https://www.facebook.com/bekocarssale/?modal=admin_todo_tour"><i class="fa fa-facebook"></i></a></li>
                                        <li><a title="" href="#"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a title="" href="#"><i class="fa fa-linkedin"></i></a></li>
                                        <li><a title="" href="#"><i class="fa fa-dribbble"></i></a></li>
                                        <li><a title="" href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a title="" href="#"><i class="fa fa-tumblr"></i></a></li>
                                    </ul>
                                    <!-- <div id="map" style="height:200px; width:100%;"></div> -->
                                    <div id="mapid" style="height:200px; width:100%;"></div>
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

            // $(function () {
            //     var foo = $('.gallery-box');
            //     foo.poptrox({
            //         usePopupCaption: true
            //     });
            // });

    });
    // function initMap() {
    //     var uluru = {lat: 51.088643, lng: -0.720827};
    //     var map = new google.maps.Map(
    //         document.getElementById('map'), {zoom: 17, center: uluru}
    //     );
    //     var marker = new google.maps.Marker({position: uluru, map: map});
    // }

    var map = L.map('mapid').setView([51.088643, -0.720827], 17);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([51.088643, -0.720827]).addTo(map)
        // .bindPopup('A pretty CSS3 popup.<br> Easily customizable.')
        .openPopup();
</script>
<!-- <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA4WCaSqIZtUBSWqQ44BP0cpNGZxmEet00&callback=initMap"> </script> -->
@endsection

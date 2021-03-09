<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BEKO CAR SALES</title>

    <!-- Styles -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('img/favicon.png') }}"/>
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('fonts/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
	<link href="{{ asset('fonts/themify-icons/themify-icons.css') }}" rel="stylesheet">
	<link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet">
	<link href="{{ asset('css/price-range.css') }}" rel="stylesheet">
	<link href="{{ asset('css/lightslider.min.css') }}" rel="stylesheet">

	<link href="{{ asset('css/style.css') }}" rel="stylesheet">
	<link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
	<link href="{{ asset('css/colors.css') }}" rel="stylesheet">

    <link href="{{ asset('js/rs-plugin/css/settings.css') }}" rel="stylesheet">

    <!-- <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet"> -->

    <!-- Notifications -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet">
    <script src="{{ asset('js/jquery-1.10.2.min.js') }}" ></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.12/css/lightgallery.css"> -->
    <!-- Google maps -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"
   integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
   crossorigin=""/>
   <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"
   integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og=="
   crossorigin=""></script>
</head>
<body>

    <!-- /.preloader -->
    <div id="preloader"></div>
    <div class="theme-layout">

        <div class="account-popup-sec">

            <div class="account-popup-area">
                <div class="account-popup">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="account-user">
                                <div class="logo">
                                    <a href="#" title="">
                                        <i class="fa fa-get-pocket"></i>
                                        <span>KwitaraCars</span>
                                        <strong>BEKO CAR SALES</strong>
                                    </a>
                                </div><!-- LOGO -->
                                <form>
                                    <h1>Login Form</h1>
                                    <div class="field">
                                        <input type="text" placeholder="Username" />
                                    </div>
                                    <div class="field">
                                        <input type="password" placeholder="Password" />
                                    </div>
                                    <div class="field">
                                        <input type="submit" value="SEND NOW" class="flat-btn" />
                                    </div>
                                </form>
                                <i>OR</i>
                                <span>LOGIN WITH</span>
                                <ul class="social-btns">
                                    <li><a href="#" title=""><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#" title=""><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#" title=""><i class="fa fa-twitter"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="registration-sec">
                                <h1>SIGNUP Form</h1>
                                <form>
                                    <div class="field">
                                        <input type="text" placeholder="Your Name" />
                                    </div>
                                    <div class="field">
                                        <input type="text" placeholder="Your Email" />
                                    </div>
                                    <div class="field">
                                        <input type="password" placeholder="Type Password" />
                                    </div>
                                    <div class="field">
                                        <input type="password" placeholder="Retype Password" />
                                    </div>
                                    <label>
                                        <input type="checkbox" /> By Clicking on this You are agree with our <a href="#" title="">Terms & Condition</a>
                                    </label>
                                    <input type="submit" value="Singup Now" class="flat-btn" />
                                </form>
                            </div><!-- Registration sec -->
                        </div>
                    </div>
                    <span class="close-popup"><i class="fa fa-close"></i></span>
                </div>
            </div>
        </div><!-- Account Popup Sec -->

        <header class="simple-header for-sticky ">
            <div class="top-bar">
                <div class="container">
                    <ul class="contact-item">
                        <li><i class="fa fa-envelope-o"></i>bekocarssale@gmail.com</li>
                        <li><i class="fa fa-mobile"></i>+44 7737 041505</li>
                    </ul>
                    <!-- <div class="choose-language">
                        <a href="#" title="">FR</a>
                        <a href="#" title="">DE</a>
                        <a href="#" title="">EN</a>
                        <a href="#" title="">jp</a>
                    </div> -->
                </div>
            </div><!-- Top bar -->
            <div class="menu">
                <div class="container">
                    <div class="logo">
                        <a href="{{ route('index') }}" title="">
                            <!-- <i class="fa fa-car"></i> -->
                            <!-- <img style="float:left; margin-right:10px" height="50" width="50" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHg9IjBweCIgeT0iMHB4IiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgdmlld0JveD0iMCAwIDQ1IDQ1IiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA0NSA0NTsiIHhtbDpzcGFjZT0icHJlc2VydmUiIGNsYXNzPSIiPjxnPjxnPgoJPGc+CgkJPGc+CgkJCTxwYXRoIGQ9Ik00NC44MDEsMjQuMTk4Yy0wLjUwNi0xLjc1LTQuNTEtMy4yODktNS4zMDYtMy41OGMtMC44NTQtMC4zMTMtMy4wNDctMS4wNjMtNS4xNTMtMS4zMzkgICAgIGMtMy42OTctMS44MDktNy44NDMtMy4wNzMtNy45MjItMy4wOTZjLTAuMDY2LTAuMDE0LTEuNzA2LTAuMzU4LTYuMjg0LTAuMzU4Yy0zLjA0MywwLTYuMDEzLDAuNi04LjYzMywxLjEyOCAgICAgYy0xLjM3MiwwLjI3Ny0yLjY2NywwLjU0LTMuODE3LDAuNjgyYy0zLjMwNCwwLjQwOC01Ljc5MiwwLjQ0Ni01LjgxNywwLjQ0NmMtMC4xOTcsMC4wMDMtMC4zNzQsMC4xMjQtMC40NDcsMC4zMDggICAgIEMxLjM2MywxOC41MzQsMCwyMS45NjYsMCwyMy41MzVjMCwxLjY5OCwyLjM3LDMuNDA1LDIuNjQsMy41OTVjMC4wODIsMC4wNTgsMC4xOCwwLjA4OCwwLjI4LDAuMDg4aDAuOTg3ICAgICBjMC43MzMsMS4xNzEsMi4wMjcsMS45NTcsMy41MDcsMS45NTdjMS40ODEsMCwyLjc3NC0wLjc4NCwzLjUwOC0xLjk1N2gyMC4zMjVjMC43MDUsMS4xNjcsMS45NzQsMS45NTcsMy40MzUsMS45NTcgICAgIHMyLjcyOS0wLjc5LDMuNDM2LTEuOTU3aDYuMjU0YzAuMjEzLDAsMC40MDEtMC4xMzcsMC40NjctMC4zNEM0NC44NTIsMjYuODI4LDQ1LjIxOSwyNS42NDQsNDQuODAxLDI0LjE5OHogTTMyLjc3LDE5LjYyMSAgICAgYy0wLjg1MiwwLjE3OS0xLjc4OCwwLjI5LTIuODE0LDAuMzQybDAuMDI2LTAuMDQ4YzAuMDY4LTAuMTI1LDAuMDgxLTAuMjc2LDAuMDMtMC40MTFjLTAuMDUxLTAuMTM2LTAuMTYtMC4yNDEtMC4yOTUtMC4yOSAgICAgbC0xLjQ3My0wLjUyMWMtMC4xMzUtMC4wNDgtMC4yOC0wLjAzNC0wLjQwMywwLjAzNGMtMC4xMjMsMC4wNjktMC4yMSwwLjE4OC0wLjIzOSwwLjMyN0wyNy40MSwxOS45OCAgICAgYy0yLjQ5NS0wLjA4Mi01LjI2Ny0wLjQxNS04LjMzMi0wLjgzOGwxLjM0My0yLjMzNmM0LjE4LDAuMDE0LDUuNzQ1LDAuMzI1LDUuNzU2LDAuMzI1QzI2LjIxOCwxNy4xNDMsMjkuNDg2LDE4LjE0LDMyLjc3LDE5LjYyMSAgICAgeiBNMTEuNjk3LDE3LjkxM2MyLjMyLTAuNDY4LDQuOTIzLTAuOTcsNy41Ny0xLjA3bC0xLjIzNywyLjE1M2MtMC41NDgtMC4wNzctMS4xMDQtMC4xNTctMS42NzMtMC4yMzcgICAgIGMtMS43MDctMC4yNDMtMy40NDktMC40OTItNS4yNTYtMC43MjZDMTEuMjk5LDE3Ljk5MywxMS40OTcsMTcuOTUzLDExLjY5NywxNy45MTN6IE03LjQxNCwyOC4xOTYgICAgIGMtMS43NDgsMC0zLjE3Mi0xLjQyNC0zLjE3Mi0zLjE3MmMwLTEuNzUsMS40MjQtMy4xNzEsMy4xNzItMy4xNzFjMS43NSwwLDMuMTczLDEuNDIxLDMuMTczLDMuMTcxICAgICBDMTAuNTg3LDI2Ljc3Miw5LjE2NCwyOC4xOTYsNy40MTQsMjguMTk2eiBNMzQuNjgyLDI4LjE5NmMtMS42OCwwLTMuMDQ1LTEuMzY2LTMuMDQ1LTMuMDQ1YzAtMS42OCwxLjM2NS0zLjA0NSwzLjA0NS0zLjA0NSAgICAgYzEuNjgxLDAsMy4wNDUsMS4zNjYsMy4wNDUsMy4wNDVDMzcuNzI3LDI2LjgzLDM2LjM1OSwyOC4xOTYsMzQuNjgyLDI4LjE5NnoiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIGNsYXNzPSJhY3RpdmUtcGF0aCIgc3R5bGU9ImZpbGw6I0ZEMDEwMSIgZGF0YS1vbGRfY29sb3I9IiNGQzAzMDMiPjwvcGF0aD4KCQkJPGNpcmNsZSBjeD0iNy40MTQiIGN5PSIyNS4wMjUiIHI9IjIuMDIiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIGNsYXNzPSJhY3RpdmUtcGF0aCIgc3R5bGU9ImZpbGw6I0ZEMDEwMSIgZGF0YS1vbGRfY29sb3I9IiNGQzAzMDMiPjwvY2lyY2xlPgoJCQk8Y2lyY2xlIGN4PSIzNC42ODIiIGN5PSIyNS4xNTEiIHI9IjIuMDIiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIGNsYXNzPSJhY3RpdmUtcGF0aCIgc3R5bGU9ImZpbGw6I0ZEMDEwMSIgZGF0YS1vbGRfY29sb3I9IiNGQzAzMDMiPjwvY2lyY2xlPgoJCTwvZz4KCTwvZz4KPC9nPjwvZz4gPC9zdmc+" /> -->
                            <img style="float:left; margin-right:5px" height="45" width="45" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHg9IjBweCIgeT0iMHB4IiB2aWV3Qm94PSIwIDAgNDQ5Ljk5OSA0NDkuOTk5IiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA0NDkuOTk5IDQ0OS45OTk7IiB4bWw6c3BhY2U9InByZXNlcnZlIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgY2xhc3M9IiI+PGc+PHBhdGggc3R5bGU9ImZpbGw6I0Y4MDAwMCIgZD0iTTQ0OS45NzcsMTcxLjk4MSAgYy0wLjM1OS02Ljc4My01LjA2NC0xMS4yNzMtMTAuNTA5LTEwLjAyOGwtMzkuNzg1LDkuMDk2Yy00LjExNSwwLjk0MS03LjQ3MSw0Ljg5Mi04LjcwOSw5LjY5NCAgYy0xNy40NzgtMjUuMTc2LTQ4LjI2Ni02NS45NC03MC4xNjEtNzUuMTAxYy0zLjAzMS0xLjI0Ni0yMS44OTctNy40NjEtOTUuODE0LTcuNDYxcy05Mi43ODIsNi4yMTUtOTUuODc4LDcuNDg4ICBjLTIxLjg0OSw5LjE0MS01Mi42MjMsNDkuODk4LTcwLjA5Nyw3NS4wNzNjLTEuMjM5LTQuODAyLTQuNTk0LTguNzUyLTguNzA5LTkuNjkzbC0zOS43ODUtOS4wOTYgIGMtNS40NDQtMS4yNDUtMTAuMTQ5LDMuMjQ1LTEwLjUwOSwxMC4wMjhjLTAuMzYyLDYuNzg0LDMuNzYsMTMuMjkyLDkuMjAyLDE0LjUzN2wzNS4yOTIsOC4wNjkgIGMtMTIuMzAzLDkuMTczLTIwLjI3MSwyMy44MzctMjAuMjcxLDQwLjM2M2w1LjAzMSw4Ni44NmMwLDE2LjU3NCwxMy40MzYsMzAuMDA5LDMwLjAxLDMwLjAwOWgxOC4wNDcgIGMxNi41NzQsMCwzMC4wMDktMTMuNDM1LDMwLjAwOS0zMC4wMDlsLTAuNTg5LTYuMzU4aDIzNi40OTJsLTAuNTg5LDYuMzU4YzAsMTYuNTc0LDEzLjQzNSwzMC4wMDksMzAuMDA5LDMwLjAwOWgxOC4wNDcgIGMxNi41NzQsMCwzMC4wMS0xMy40MzUsMzAuMDEtMzAuMDA5bDUuMDMxLTg2Ljg2YzAtMTYuNTI2LTcuOTY4LTMxLjE4OS0yMC4yNzEtNDAuMzYzbDM1LjI5Mi04LjA2OSAgQzQ0Ni4yMTcsMTg1LjI3Myw0NTAuMzM5LDE3OC43NjUsNDQ5Ljk3NywxNzEuOTgxeiBNMTM3LjQxOSwxMjYuMTk4YzEuNzM1LTAuNTY0LDE5LjkwOS01Ljg3Nyw4Ny41ODEtNS44NzcgIGM2Ny41MzUsMCw4NS43NzIsNS4yOTIsODcuNTcsNS44NzRjMTMuMDk3LDUuNjksMzUuNTY4LDMyLjgyOCw1NC4wMzMsNTguNDM4SDgzLjM5NCAgQzEwMS44ODEsMTU4Ljk5MSwxMjQuMzc2LDEzMS44MjIsMTM3LjQxOSwxMjYuMTk4eiBNMjY3LjI2NSwzMDAuNzY0aC04NC41MzFjLTMuODkyLDAtNy4wNDUtMy4xNTQtNy4wNDUtNy4wNDQgIGMwLTMuODkxLDMuMTUzLTcuMDQ0LDcuMDQ1LTcuMDQ0aDg0LjUzMWMzLjg5MiwwLDcuMDQ1LDMuMTU0LDcuMDQ1LDcuMDQ0QzI3NC4zMSwyOTcuNjEsMjcxLjE1NywzMDAuNzY0LDI2Ny4yNjUsMzAwLjc2NHogICBNMzM2LjA5OSwyNjMuMTk0YzAsMC0xNC4wODktOC4xMTYtMzEuMTk2LTEwLjA5NkgxMzYuNDQyYy0xNy4xMDcsMS45OC0zMS4xOTYsMTAuMDk2LTMxLjE5NiwxMC4wOTYgIGMtMzkuMjQ3LDEwLjA2NC00OS45MTQtMjIuMTM5LTQ5LjkxNC0yMi4xMzloMzMwLjY4MkMzODYuMDEzLDI0MS4wNTUsMzc1LjM0NiwyNzMuMjU3LDMzNi4wOTksMjYzLjE5NHoiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIGNsYXNzPSJhY3RpdmUtcGF0aCIgZGF0YS1vbGRfY29sb3I9IiNGRDFDMDMiPjwvcGF0aD48L2c+IDwvc3ZnPg==" />
                            <span>BEKO CAR SALES</span>
                            <strong>CAR DEALERSHIP</strong>
                        </a>
                    </div><!-- LOGO -->
                    <!-- <div class="popup-client">
                        <span><i class="fa fa-user"></i> /  Signup</span>
                    </div> -->
                    <span class="menu-toggle"><i class="fa fa-bars"></i></span>
                    <nav>
                        <h1 class="nocontent outline">--- Main Navigation ---</h1>
                        <ul>
                            <li><a href="{{ route('index') }}" title="">HOME</a></li>
                            <li><a href="{{ route('car.list') }}" title="">CAR CATALOG</a></li>
                            <!-- <li><a href="#" title="">ABOUT US</a></li> -->
                            <li><a href="{{ route('contact') }}" title="">CONTACT</a></li>
                        </ul>
                    </nav>

                </div>
            </div>
        </header>

		@yield('theme-content')

		<footer>
            <section class="top-line">
                <div class="parallax scrolly-invisible no-parallax blackish"></div><!-- PARALLAX BACKGROUND IMAGE -->
                <div class="container">
                    <div class="row">

                        <div class="col-md-4 column">
                            <div class="links_widget widget">
                                <div class="heading1">
                                    <h2><span>Menu</span> Navigation</h2>
                                </div><!-- heading -->
                                <ul>
                                    <li><a href="{{ route('index') }}" title=""><i class="fa fa-angle-right"></i> Home</a></li>
                                    <li><a href="{{ route('car.list') }}" title=""><i class="fa fa-angle-right"></i> Car Catalog</a></li>
                                    <!-- <li><a href="#" title=""><i class="fa fa-angle-right"></i> About Us</a></li> -->
                                    <li><a href="{{ route('contact') }}" title=""><i class="fa fa-angle-right"></i> Contact</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-4 column">
                            <div class="about_widget widget">
                                <div class="heading1">
                                    <h2><span>Contact</span> Us</h2>
                                </div><!-- heading -->

                                <span><i class="fa fa-envelope"></i>bekocarssale@gmail.com</span>
                                <span><i class="fa fa-phone"></i>+44 7737 041505</span>
                                <span><i class="fa fa-location-arrow"></i>Haslemere GU27 1DB England</span>
                                <ul class="social-btns">
                                    <li><a href="#" title=""><i class="fa fa-facebook"></i></a></li>
                                    <!-- <li><a href="#" title=""><i class="fa fa-instagram"></i></a></li> -->
                                    <li><a href="#" title=""><i class="fa fa-linkedin"></i></a></li>
                                    <!-- <li><a href="#" title=""><i class="fa fa-dribbble"></i></a></li> -->
                                    <li><a href="#" title=""><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#" title=""><i class="fa fa-tumblr"></i></a></li>
                                </ul>
                            </div>
                        </div>



                        <div class="col-md-4 column">
                            <div class="subscribe_widget widget">
                                <div class="heading1">
                                    <h2><span>Subscribe</span> Us</h2>
                                </div><!-- heading -->
                                <p>Subscribe to us and keep up with any news</p>
                                <form method="post" action="{{ route('subscribe') }}">
                                    @csrf
                                    <label><input type="text" name="email" placeholder="TYPE YOUR EMAIL" required /></label>
                                    <button type="submit" class="flat-btn"><i class="ti ti-email"></i></button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
            <div class="bottom-line">
                <div class="container">
                    <span>Copyright All Right Reserved 2019 <a href="#" title="">BEKO CAR SALES</a></span>
                    <ul>
                        <li><a href="{{ route('index') }}" title="">HOME</a></li>
                        <li><a href="{{ route('car.list') }}" title="">CAR CATALOG</a></li>
                        <!-- <li><a href="#" title="">ABOUT US</a></li> -->
                        <li><a href="{{ route('contact') }}" title="">CONTACT</a></li>
                    </ul>
                </div>
            </div>
            <a href="#" class="scrollToTop"><i class="ti ti-arrow-circle-up"></i></a>
        </footer>

    </div>

    <!-- Script -->
	<script src="{{ asset('js/modernizr.js') }}" ></script><!-- Modernizer -->
	<script src="{{ asset('js/bootstrap.min.js') }}" ></script><!-- Bootstrap -->
	<script src="{{ asset('js/owl.carousel.min.js') }}" ></script><!-- Owl Carousal -->
	<script src="{{ asset('js/html5lightbox.js') }}" ></script><!-- HTML -->
	<script src="{{ asset('js/scrolly.js') }}" ></script><!-- Parallax -->
	<script src="{{ asset('js/price-range.js') }}" ></script><!-- Parallax -->
    <script src="{{ asset('js/script.js') }}" ></script><!-- Script -->
    <script src="{{ asset('js/lightslider.min.js') }}" ></script><!-- LightSLider -->

	<script src="{{ asset('js/rs-plugin/js/jquery.themepunch.tools.min.js') }}" ></script>
    <script src="{{ asset('js/rs-plugin/js/jquery.themepunch.revolution.min.js') }}" ></script>

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.12/js/lightgallery-all.js"></script> -->

    <!-- Notifications -->


	@yield('theme-script')

</body>
</html>


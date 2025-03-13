<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />
    <title>EduCore - Online Courses & Education HTML Template</title>
    <link rel="icon" type="image/png" href="images/favicon.png">
    <link rel="stylesheet" href="{{ asset('frontend/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/animated_barfiller.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/venobox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/scroll_button.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/pointer.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery.calendar.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/range_slider.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/startRating.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/video_player.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery.simple-bar-graph.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/sticky_menu.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}">
    <link rel=" stylesheet" href="{{ asset('frontend/css/spacing.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">
</head>
<body class="home_3">
    <!--============ PRELOADER START ===========-->
    <div id="preloader">
        <div class="preloader_icon">
            <img src="images/preloader.png" alt="Preloader" class="img-fluid">
        </div>
    </div>
    <!--============ PRELOADER START ===========-->
    @include('includes.front-header')
    @yield('content')
    <!--===========================
        FOOTER 3 START
    ============================-->
    <footer class="footer_3" style="background: url(images/footer_3_bg.jpg);">
        <div class="footer_3_overlay pt_120 xs_pt_100">
            <div class="wsus__footer_bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 wow fadeInUp">
                            <div class="wsus__footer_3_logo_area">
                                <a class="logo" href="index.html">
                                    <img src="images/footer_logo.png" alt="EduCore" class="img-fluid">
                                </a>
                                <p>Nunc in sollicitudin diam, ut bibendum malesuada sodales porttitor.</p>
                                <h2>Follow Us On</h2>
                                <ul class="d-flex flex-wrap">
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-6 col-md-3 wow fadeInUp">
                            <div class="wsus__footer_link">
                                <h2>Courses</h2>
                                <ul>
                                    <li><a href="#">Life Coach</a></li>
                                    <li><a href="#">Business Coach</a></li>
                                    <li><a href="#">Health Coach</a></li>
                                    <li><a href="#">Development</a></li>
                                    <li><a href="#">SEO Optimize</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-6 col-md-3 wow fadeInUp">
                            <div class="wsus__footer_link">
                                <h2>Programs</h2>
                                <ul>
                                    <li><a href="#">The Arts</a></li>
                                    <li><a href="#">Human Sciences</a></li>
                                    <li><a href="#">Economics</a></li>
                                    <li><a href="#">Natural Sciences</a></li>
                                    <li><a href="#">Business</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 wow fadeInUp">
                            <div class="wsus__footer_3_subscribe">
                                <h3>Subscribe Our Newsletter</h3>
                                <form action="#">
                                    <input type="text" placeholder="Enter Your Email">
                                    <button type="submit" class="common_btn">Subscribe</button>
                                </form>
                                <ul>
                                    <li>
                                        <div class="icon">
                                            <img src="images/call_icon_white.png" alt="Call" class="img-fluid">
                                        </div>
                                        <div class="text">
                                            <h4>Call us:</h4>
                                            <a href="mailto:example@gmail.com">example@gmail.com</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <img src="images/location_icon_white.png" alt="Call" class="img-fluid">
                                        </div>
                                        <div class="text">
                                            <h4>Office:</h4>
                                            <p>25-02 44th Queens, NY 3645, United States</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wsus__footer_copyright_area mt_140 xs_mt_100">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="wsus__footer_copyright_text">
                                <p>Copyright © 2024 All Rights Reserved by EduCore Education</p>
                                <ul>
                                    <li><a href="#">Privacy Policy</a></li>
                                    <li><a href="#">Term of Service</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--===========================
        FOOTER 3 END
    ============================-->
    <!--================================
        SCROLL BUTTON START
    =================================-->
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <!--================================
        SCROLL BUTTON END
    =================================-->
    <!--jquery library js-->
    <script src="{{ asset('frontend/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/js/Font-Awesome.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.marquee.min.js') }}"></script>
    <script src="{{ asset('frontend/js/slick.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.countup.min.js') }}"></script>
    <script src="{{ asset('frontend/js/venobox.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('frontend/js/scroll_button.js') }}"></script>
    <script src="{{ asset('frontend/js/pointer.js') }}"></script>
    <script src="{{ asset('frontend/js/range_slider.js') }}"></script>
    <script src="{{ asset('frontend/js/animated_barfiller.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.calendar.js') }}"></script>
    <script src="{{ asset('frontend/js/starRating.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.simple-bar-graph.min.js') }}"></script>
    <script src="{{ asset('frontend/js/select2.min.js') }}"></script>
    <script src="{{ asset('frontend/js/video_player.min.js') }}"></script>
    <script src="{{ asset('frontend/js/video_player_youtube.js') }}"></script>
    <script src="{{ asset('frontend/js/wow.min.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>
</body>
</html>

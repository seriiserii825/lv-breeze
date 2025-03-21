@props(['title' => ''])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>EduCore - Online Courses & Education HTML Template</title>
    <link rel="icon" type="image/png" href="images/favicon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
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
    @vite('resources/js/app.js')

</head>
<body class="home_3">
    @include('includes.front-header')
    <x-utils.preloader />
    <x-utils.breadcrumb title="{{ $title }}" />
    <section class="wsus__dashboard mt_90 xs_mt_70 pb_120 xs_pb_100">
        <div class="container">
            @if (session('success'))
                <x-utils.alert type="success" message="{{ session('success') }}" />
            @endif
            @if (session('error'))
                <x-utils.alert type="error" message="{{ session('error') }}" />
            @endif
            @if ($errors->updatePassword->any())
                <x-utils.alert type="error" message="{{ $errors->updatePassword->first() }}" />
            @endif
            <div class="row">
                <div class="col-xl-3 col-md-4 wow fadeInLeft">
                    <x-utils.user-sidebar />
                </div>
                <div class="col-xl-9 col-md-8">
                    @if (auth()->user()->role == 'student')
                        <div class="mb-4">
                            @if (auth()->user()->approve_status == 'pending')
                                <x-utils.alert type="info"
                                    message="{{ 'Hello ' . auth()->user()->name . ' your instructor email is currently pending. We will will send an email when you will be approved after' }}" />
                            @else
                                <div class="flex-row-reverse d-flex">
                                    <a href="{{ route('student.become-instructor') }}" class="btn btn-primary">Become
                                        instructor</a>
                                </div>
                            @endif
                        </div>
                    @endif
                    {{ $slot }}
                </div>
            </div>
        </div>
    </section>
    <!--================================
        SCROLL BUTTON START
    =================================-->
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    @include('includes.footer')
    <!--================================
        SCROLL BUTTON END
    =================================-->
    <!--jquery library js-->
    <script src="{{ asset('frontend/js/jquery-3.7.1.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
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

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

    @vite(['resources/js/admin/password.js', 'resources/css/app.css'])
</head>
<body class="home_3">
    <!--===========================
        SIGN IN START
    ============================-->
    <section class="wsus__sign_in">
        <div class="row align-items-center">
            <div class="col-xxl-5 col-xl-6 col-lg-6 wow fadeInLeft">
                <div class="wsus__sign_img">
                    <img src="{{ asset('frontend/images/login_img_1.jpg') }}" alt="login" class="img-fluid">
                    <a href="index.html">
                        <img src="{{ asset('frontend/images/logo.png') }}" alt="EduCore" class="img-fluid">
                    </a>
                </div>
            </div>
            <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-9 m-auto wow fadeInRight">
                <div class="wsus__sign_form_area">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab" tabindex="0">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <h2>Log in<span>!</span></h2>
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="wsus__login_form_input">
                                            <x-email-component name="email" label="Email" placeholder="Email"
                                                :required="true" />
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="wsus__login_form_input">
                                            <x-password-component name="password" label="Password"
                                                placeholder="Password" :required="true" />
                                        </div>
                                    </div>
                                    <a href="{{ route('password.request') }}" class="text-xs text-blue-500">Forgot
                                        password</a>
                                    <div class="col-xl-12">
                                        <div class="wsus__login_form_input">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    name="remember" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    Remember Me
                                                </label>
                                            </div>
                                            <button type="submit" class="common_btn">Sign In</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            {{-- <p class="or">or</p> --}}
                            {{-- <ul class="social_login d-flex flex-wrap"> --}}
                            {{--     <li> --}}
                            {{--         <a href="#"> --}}
                            {{--             <span><img src="{{ asset('frontend/images/google_icon.png') }}" alt="Google" class="img-fluid"></span> --}}
                            {{--             Google --}}
                            {{--         </a> --}}
                            {{--     </li> --}}
                            {{-- </ul> --}}
                            <p class="create_account">Don't have an account? <a href="sign_up.html">Create free
                                    account</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="back_btn" href="{{ route('home') }}">Back to Home</a>
    </section>
    <!--===========================
        SIGN IN END
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


{{-- <x-guest-layout> --}}
{{--     <!-- Session Status --> --}}
{{--     <x-auth-session-status class="mb-4" :status="session('status')" /> --}}
{{--  --}}
{{--     <form method="POST" action="{{ route('login') }}"> --}}
{{--         @csrf --}}
{{--  --}}
{{--         <!-- Email Address --> --}}
{{--         <div> --}}
{{--             <x-input-label for="email" :value="__('Email')" /> --}}
{{--             <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" /> --}}
{{--             <x-input-error :messages="$errors->get('email')" class="mt-2" /> --}}
{{--         </div> --}}
{{--  --}}
{{--         <!-- Password --> --}}
{{--         <div class="mt-4"> --}}
{{--             <x-input-label for="password" :value="__('Password')" /> --}}
{{--  --}}
{{--             <x-text-input id="password" class="block mt-1 w-full" --}}
{{--                             type="password" --}}
{{--                             name="password" --}}
{{--                             required autocomplete="current-password" /> --}}
{{--  --}}
{{--             <x-input-error :messages="$errors->get('password')" class="mt-2" /> --}}
{{--         </div> --}}
{{--  --}}
{{--         <!-- Remember Me --> --}}
{{--         <div class="block mt-4"> --}}
{{--             <label for="remember_me" class="inline-flex items-center"> --}}
{{--                 <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember"> --}}
{{--                 <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span> --}}
{{--             </label> --}}
{{--         </div> --}}
{{--  --}}
{{--         <div class="flex items-center justify-end mt-4"> --}}
{{--             @if (Route::has('password.request')) --}}
{{--                 <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}"> --}}
{{--                     {{ __('Forgot your password?') }} --}}
{{--                 </a> --}}
{{--             @endif --}}
{{--  --}}
{{--             <x-primary-button class="ms-3"> --}}
{{--                 {{ __('Log in') }} --}}
{{--             </x-primary-button> --}}
{{--         </div> --}}
{{--     </form> --}}
{{-- </x-guest-layout> --}}

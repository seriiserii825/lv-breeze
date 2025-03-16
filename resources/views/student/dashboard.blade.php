<x-layouts.front-layout>
    <x-utils.breadcrumb title="Student Dashboard" />
    <section class="wsus__dashboard mt_90 xs_mt_70 pb_120 xs_pb_100">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-md-4 wow fadeInLeft">
                    <div class="wsus__dashboard_sidebar">
                        <div class="wsus__dashboard_sidebar_top">
                            <div class="dashboard_banner">
                                <img src="{{ asset('frontend/images/single_topic_sidebar_banner.jpg') }}" alt="img"
                                    class="img-fluid">
                            </div>
                            <div class="img">
                                <img src="{{ asset('frontend/images/dashboard_profile_img.png') }}" alt="profile"
                                    class="img-fluid w-100">
                            </div>
                            <h4>Norman Gordon</h4>
                            <p>Instructor</p>
                        </div>
                        <ul class="wsus__dashboard_sidebar_menu">
                            <li>
                                <a href="dashboard.html" class="active">
                                    <div class="img">
                                        <img src="{{ asset('frontend/images/dash_icon_8.png') }}" alt="icon"
                                            class="img-fluid w-100">
                                    </div>
                                    Dashboard
                                </a>
                            </li>
                            <li>
                                <a href="dashboard_profile.html">
                                    <div class="img">
                                        <img src="{{ asset('frontend/images/dash_icon_1.png') }}" alt="icon"
                                            class="img-fluid w-100">
                                    </div>
                                    Profile
                                </a>
                            </li>
                            <li>
                                <a href="dashboard_courses.html">
                                    <div class="img">
                                        <img src="{{ asset('frontend/images/dash_icon_2.png') }}" alt="icon"
                                            class="img-fluid w-100">
                                    </div>
                                    Courses
                                </a>
                            </li>
                            <li>
                                <a href="dashboard_review.html">
                                    <div class="img">
                                        <img src="{{ asset('frontend/images/dash_icon_4.png') }}" alt="icon"
                                            class="img-fluid w-100">
                                    </div>
                                    Reviews
                                </a>
                            </li>
                            <li>
                                <a href="dashboard_order.html">
                                    <div class="img">
                                        <img src="{{ asset('frontend/images/dash_icon_5.png') }}" alt="icon"
                                            class="img-fluid w-100">
                                    </div>
                                    Orders
                                </a>
                            </li>
                            <li>
                                <a href="dashboard_student.html">
                                    <div class="img">
                                        <img src="{{ asset('frontend/images/dash_icon_6.png') }}" alt="icon"
                                            class="img-fluid w-100">
                                    </div>
                                    Students
                                </a>
                            </li>
                            <li>
                                <a href="dashboard_payout.html">
                                    <div class="img">
                                        <img src="{{ asset('frontend/images/dash_icon_7.png') }}" alt="icon"
                                            class="img-fluid w-100">
                                    </div>
                                    Payouts
                                </a>
                            </li>
                            <li>
                                <a href="dashboard_support.html">
                                    <div class="img">
                                        <img src="{{ asset('frontend/images/dash_icon_8.png') }}" alt="icon"
                                            class="img-fluid w-100">
                                    </div>
                                    Support Tickets
                                </a>
                            </li>
                            <li>
                                <a href="dashboard_security.html">
                                    <div class="img">
                                        <img src="{{ asset('frontend/images/dash_icon_10.png') }}" alt="icon"
                                            class="img-fluid w-100">
                                    </div>
                                    Security
                                </a>
                            </li>
                            <li>
                                <a href="dashboard_social_account.html">
                                    <div class="img">
                                        <img src="{{ asset('frontend/images/dash_icon_11.png') }}" alt="icon"
                                            class="img-fluid w-100">
                                    </div>
                                    Social Profile
                                </a>
                            </li>
                            <li>
                                <a href="dashboard_notification.html">
                                    <div class="img">
                                        <img src="{{ asset('frontend/images/dash_icon_12.png') }}" alt="icon"
                                            class="img-fluid w-100">
                                    </div>
                                    Notifications
                                </a>
                            </li>
                            <li>
                                <a href="dashboard_privacy.html">
                                    <div class="img">
                                        <img src="{{ asset('frontend/images/dash_icon_13.png') }}" alt="icon"
                                            class="img-fluid w-100">
                                    </div>
                                    Profile Privacy
                                </a>
                            </li>
                            <li>
                                <a href="#" class="btn-signout">
                                    <div class="img">
                                        <img src="{{ asset('frontend/images/dash_icon_16.png') }}" alt="icon"
                                            class="img-fluid w-100">
                                    </div>
                                    Sign Out
                                    <form id="js-form-logout" method="POST" action="{{ route('logout') }}">
                                        @csrf
                                    </form>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-9 col-md-8">
                    @if (auth()->user()->approve_status == 'pending')
                        <x-utils.alert type="info"
                            message="{{ 'Hello ' . auth()->user()->name . ' your instructor email is currently pending. We will will send an email when you will be approved after' }}" />
                    @endif
                    <div class="flex justify-end">
                        <a href="{{ route('student.become-instructor') }}" class="btn btn-primary">Become instructor</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.front-layout>
<script>
    const btn = document.querySelector(".btn-signout");
    btn.addEventListener("click", (e) => {
        e.preventDefault();
        document.getElementById("js-form-logout").submit();
    });
</script>

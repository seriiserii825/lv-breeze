<div class="wsus__dashboard_sidebar">
    <div class="wsus__dashboard_sidebar_top">
        <div class="dashboard_banner">
            <img src="{{ asset('frontend/images/single_topic_sidebar_banner.jpg') }}" alt="img" class="img-fluid">
        </div>
        <div class="img">
            @if (auth()->user()->image)
                <img src="{{ asset(auth()->user()->image) }}" alt="profile" class="img-fluid w-100">
            @else
                <img src="{{ asset('frontend/images/dashboard_profile_img.png') }}" alt="profile"
                    class="img-fluid w-100">
            @endif
        </div>
        <h4>{{ auth()->user()->name }}</h4>
        <p>{{ auth()->user()->role }}</p>
    </div>
    <ul class="wsus__dashboard_sidebar_menu">
        @if (auth()->user()->role == 'student')
            <x-navigation.sidebar-link route="{{ route('student.dashboard') }}" icon="dash_icon_8.png" title="Dashboard"
                active="{{ request()->is('student/dashboard') }}" />
            <x-navigation.sidebar-link route="{{ route('student.profile.index', auth()->user()->id) }}"
                icon="dash_icon_8.png" title="Profile"
                active="{{ request()->is('student/profile/' . auth()->user()->id) }}" />
        @else
            <x-navigation.sidebar-link route="{{ route('instructor.dashboard') }}" icon="dash_icon_1.png"
                title="Dashboard" active="{{ request()->is('instructor/dashboard') }}" />
            <x-navigation.sidebar-link route="{{ route('instructor.profile.index', auth()->user()->id) }}"
                icon="dash_icon_8.png" title="Profile"
                active="{{ request()->is('instructor/profile/' . auth()->user()->id) }}" />
            @php
                $active = request()->is('instructor/courses') || request()->is('instructor/courses/*');
            @endphp
            <x-navigation.sidebar-link route="{{ route('instructor.courses.index') }}" icon="dash_icon_8.png"
                title="Courses" active="{{ $active }}" />
        @endif
        <li>
            <a href="#" class="btn-signout">
                <div class="img">
                    <img src="{{ asset('frontend/images/dash_icon_16.png') }}" alt="icon" class="img-fluid w-100">
                </div>
                Sign Out
                <form id="js-form-logout" method="POST" action="{{ route('logout') }}">
                    @csrf
                </form>
            </a>
        </li>
    </ul>
</div>
<script>
    const btn = document.querySelector(".btn-signout");
    btn.addEventListener("click", (e) => {
        e.preventDefault();
        document.getElementById("js-form-logout").submit();
    });
</script>

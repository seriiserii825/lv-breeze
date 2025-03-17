@props(['route', 'icon', 'title', 'active' => false])
<li>
    <a href="{{ route('student.dashboard') }}" class="active">
        <div class="img">
            <img src="{{ asset('frontend/images/dash_icon_8.png') }}" alt="icon" class="img-fluid w-100">
        </div>
        Dashboard
    </a>
</li>

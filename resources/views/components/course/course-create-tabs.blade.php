<ul class="nav nav-pills" id="pills-tab" role="tablist">
    <li class="nav-item" role="presentation">
        @php
            $active = route('instructor.courses.create') == url()->current() ? 'active' : '';
        @endphp
        <a href="{{ route('instructor.courses.create') }}" class="nav-link {{ $active }}">Basic Infos</a>
    </li>
    <li class="nav-item" role="presentation">
        {{-- @php --}}
        {{--     $active = route('instructor.courses.edit', ['course_id' => $course->id, 'step' => 2]) == url()->current() ? 'active' : ''; --}}
        {{-- @endphp --}}
        <a href="#" class="nav-link">More Infos</a>
    </li>
    <li class="nav-item" role="presentation">
        <a href="#" class="nav-link">Course Contents</a>
    </li>
    <li class="nav-item" role="presentation">
        <a href="#" class="nav-link">Finish</a>
    </li>
</ul>

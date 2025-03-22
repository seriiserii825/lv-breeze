@props(['step', 'label'])
<li class="nav-item" role="presentation">
    @php
        $active = Route::is('instructor.courses.edit') && request()->step == $step ? 'active' : '';
    @endphp
    <a href="{{ route('instructor.courses.edit', ['course' => request()->course, 'step' => $step]) }}"
        class="nav-link {{ $active }}">{{ $label }}</a>
</li>


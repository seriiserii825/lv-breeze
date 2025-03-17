@props(['route', 'icon', 'title', 'active' => false])
<li>
    <a href="{{ $route }}" @if ($active) class="active" @endif>
        <div class="img">
            <img src="{{ asset('frontend/images/'.$icon) }}" alt="icon" class="img-fluid w-100">
        </div>
        {{ $title }}
    </a>
</li>

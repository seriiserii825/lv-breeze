@props(['dropdown' => [], 'route' => '', 'icon' => '', 'title' => ''])
@if ($dropdown)
    <li class="nav-item dropdown">
        <a class="d-flex align-items-center gap-2 nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown"
            data-bs-auto-close="false" role="button" aria-expanded="false">
            <i class="{{ $icon }}"></i>
            <span class="nav-link-title">{{ $title }}</span>
        </a>
        <div class="dropdown-menu">
            <div class="dropdown-menu-columns">
                @foreach ($dropdown as $item)
                    <div class="dropdown-menu-column">
                        @php
                            $active = '';
                            if (url()->current() === route($item['route'])) {
                                $active = 'text-secondary';
                            }
                        @endphp
                        <a class="dropdown-item {{ $active }}" href="{{ route($item['route']) }}">
                            {{ $item['title'] }}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </li>
@else
    <li class="nav-item">
        <a class="nav-link d-flex align-items-center gap-2" href="{{ route($route) }}">
            <i class="{{ $icon }}"></i>
            <span class="nav-link-title">{{ $title }}</span>
        </a>
    </li>
@endif

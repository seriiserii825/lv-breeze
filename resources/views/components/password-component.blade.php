@props(['name', 'label' => '', 'placeholder' => '', 'required' => false, 'value' => null])
<div class="password-input">
    @if ($label)
        <label class="form-label">{{ $label }}</label>
    @endif
    <div class="input-group input-group-flat">
        <input type="password" name="{{ $name }}" {{ $required ? 'required' : null }} class="form-control"
            placeholder="{{ $placeholder }}">
        <span class="input-group-text">
            <a href="#" class="link-secondary js-toggle-password" title="Show password"
                data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="14" height="14" viewBox="0 0 24 24"
                    stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                    <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                </svg>
            </a>
        </span>
    </div>
</div>
<x-input-error :messages="$errors->get($name)" class="mt-2" />

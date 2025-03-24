@props(['name', 'label', 'value' => null, 'required' => false])
<div>
    <label style="display: block;" for="{{ $name }}" class="form-label">{{ $label }}</label>
    @if ($value && str_contains($value, '/uploads'))
        <video width="320" height="240" controls>
            <source src="{{ $value }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    @endif
</div>
<div>
    <input class="form-control" type="file" id="{{ $name }}" name="{{ $name }}">
</div>
<x-input-error :messages="$errors->get($name)" class="mt-2" />

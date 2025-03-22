@props(['name', 'label', 'value' => null, 'required' => false])
<div>
    <label style="display: block;" for="{{ $name }}" class="form-label">{{ $label }}</label>
    @if ($value)
        <img src="{{ $value }}" alt="{{ $value }}" class="mb-2 img-thumbnail" style="max-width: 100px;">
    @endif
</div>
<div>
    <input class="form-control" type="file" id="{{ $name }}" name="{{ $name }}"
        @if ($value) value="$value" @endif>
</div>
<x-input-error :messages="$errors->get($name)" class="mt-2" />

@props(['name', 'label', 'value' => null, 'required' => false])
@if($value)
    <img src="{{ $value }}" alt="{{ $value }}" class="mb-2 img-thumbnail" style="max-width: 100px;">
@endif
<label for="{{ $name }}" class="form-label">{{ $label }}</label>
<input class="form-control" type="file" id="{{ $name }}" name="{{ $name }}" @if ($value) value="$value" @endif>
<x-input-error :messages="$errors->get($name)" class="mt-2" />

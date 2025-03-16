@props(['name', 'label', 'value' => null, 'required' => false])
<label for="{{ $name }}" class="form-label">{{ $label }}</label>
<input class="form-control" type="file" id="{{ $name }}" name="{{ $name }}"
    @if ($value) value="$value" @endif>
<x-input-error :messages="$errors->get($name)" class="mt-2" />

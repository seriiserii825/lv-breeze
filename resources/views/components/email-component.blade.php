@props(['name', 'label' => '', 'placeholder' => '', 'required' => false, 'value' => null])
<label class="form-label">{{ $label }}</label>
<input type="email" name="{{ $name }}" class="form-control" value="{{ old($name, $value) }}" {{ $required ? 'required' : null }}
    placeholder="{{ $placeholder }}" autocomplete="off">
<x-input-error :messages="$errors->get($name)" class="mt-2" />


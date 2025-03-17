@props(['name', 'label' => '',  'type' => 'text', 'placeholder' => '', 'required' => false, 'value' => null])
<label class="form-label">{{ $label }}</label>
<textarea rows="10" name="{{ $name }}" class="form-control" {{ $required ? 'required' : null }} placeholder="{{ $placeholder }}" autocomplete="off">{{ old($name, $value) }}</textarea>
<x-input-error :messages="$errors->get($name)" class="mt-2" />


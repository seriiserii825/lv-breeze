@props(['name', 'label' => '', 'value' => ''])
<div class="form-label">{{ $label }}</div>
<label class="form-check form-switch">
    <input class="form-check-input" name="{{ $name }}"
        @if ($value) checked @endif type="checkbox" value="1">
    <span class="ml-2 form-check-label">toggle</span>
</label>
<x-input-error :messages="$errors->get($name)" class="mt-2" />

@props(['name', 'label' => '', 'value' => ''])
<div class="form-label">{{ $label }}</div>
<label class="form-check form-switch">
    <input class="form-check-input" name="{{ $name }}"
        @if ($value) checked @endif type="checkbox">
    <span class="form-check-label">toggle</span>
</label>

@props(['name', 'label' => '', 'value' => ''])
<label class="form-check form-switch">
    <input class="form-check-input" name="{{ $name }}"
        @if ($value) checked @endif type="checkbox">
    <span class="form-check-label">{{ $label }}</span>
</label>

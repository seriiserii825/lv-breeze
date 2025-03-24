@props(['name', 'value' => '', 'label' => '', 'id' => '', 'options' => []])
@if ($label)
    <label class="form-label">{{ $label }}</label>
@endif
<select class="form-select form-control" id="{{ $id }}" name="{{ $name }}">
    @foreach ($options as $option_value => $label)
        <option value="{{ $option_value }}"
            {{ old($name, $value ?? '') == $option_value ? 'selected' : '' }}
            @selected($option_value === $value)>
            {{ $label }}
        </option>
    @endforeach
</select>

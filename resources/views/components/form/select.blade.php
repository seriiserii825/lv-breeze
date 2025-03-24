@props(['name', 'value' => '', 'label' => '', 'id' => '', 'options' => []], 'old' => true)
@if ($label)
    <label class="form-label">{{ $label }}</label>
@endif
<select class="form-select form-control" id="{{ $id }}" name="{{ $name }}">
    @foreach ($options as $option_value => $label)
        @if ($old)
            @php
                $old_value = old($name, $value ?? '');
            @endphp
        @endif
        <option value="{{ $option_value }}" {{ $old == $option_value ? 'selected' : '' }}>
            {{ $label }}
        </option>
    @endforeach
</select>

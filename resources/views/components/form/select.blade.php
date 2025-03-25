@props(['name', 'value' => '', 'label' => '', 'id' => '', 'options' => [], 'data_file' => '', 'data_input' => ''])
@if ($label)
    <label class="form-label">{{ $label }}</label>
@endif
<select class="form-select form-control" id="{{ $id }}" name="{{ $name }}"
    @if ($data_file) data-file="{{ $data_file }}" @endif
    @if ($data_input) data-input="{{ $data_input }}" @endif>
    @foreach ($options as $option_value => $label)
        <option value="{{ $option_value }}" {{ old($name, $value ?? '') == $option_value ? 'selected' : '' }}
            @selected($option_value === $value)>
            {{ $label }}
        </option>
    @endforeach
</select>

@props(['name','value', 'options' => []])
<select class="form-select">
    @foreach($options as $option_value => $label)
        <option value="{{ $option_value }}" @selected($option_value === $value)>
            {{ $label }}
        </option>
    @endforeach
</select>


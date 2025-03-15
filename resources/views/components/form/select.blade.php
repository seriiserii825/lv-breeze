@props(['name','value',  'id' => '', 'options' => []])
<select class="form-select" id="{{ $id }}" name="{{ $name }}">
    @foreach($options as $option_value => $label)
        <option value="{{ $option_value }}" @selected($option_value === $value)>
            {{ $label }}
        </option>
    @endforeach
</select>


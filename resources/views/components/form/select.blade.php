@props(['name', 'options' => [], 'selected' => null])
<select class="form-select">
    @foreach($options as $value => $label)
        <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }}>
            {{ $label }}
        </option>
    @endforeach
</select>


@props(['name', 'options' => [], 'selected' => null, 'label' => null])

<div class="col-xl-4 add_course_more_info_radio_box">
    @if ($label)
        <h3>{{ $label }}</h3>
    @endif

    @foreach ($options as $option)
        <div class="form-check">
            <input class="form-check-input" type="radio" value="{{ $option->id }}" name="{{ $name }}"
                id="{{ $name }}-{{ $option->id }}" @checked($selected == $option->id)>
            <label class="form-check-label" for="{{ $name }}-{{ $option->id }}">
                {{ $option->name }}
            </label>
        </div>
    @endforeach

    <x-input-error :messages="$errors->get($name)" class="mt-2" />
</div>

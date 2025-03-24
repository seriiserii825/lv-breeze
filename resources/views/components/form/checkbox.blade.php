@props(['current', 'name', 'label'])
<div class="add_course_more_info_checkbox">
    <div class="form-check">
        <input name="{{ $name }}" value="1" class="form-check-input" type="checkbox" id="{{ $name }}"
            @checked($current == 1)>
        <label class="form-check-label" for="qna">{{ $label }}</label>
    </div>
</div>

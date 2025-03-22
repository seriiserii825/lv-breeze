<x-layouts.course-create-layout>
    <div class="add_course_more_info">
        <form action="{{ route('instructor.courses.update.1', ['course' => request()->course->id]) }}" method="POST"
            id="js-course-edit-first">
            @csrf
            <input type="hidden" value="{{ request()->course->id }}" name="course_id" id="id" />
            <div class="row">
                <div class="col-xl-6 add_course_more_info_input">
                    <x-form.input label="Capacity" name="capacity" type="number" :value="$course->capacity"
                        placeholder="Capacity" />
                    <p>leave blank for unlimited</p>
                </div>
                <div class="col-xl-6 add_course_more_info_input">
                    <x-form.input label="Course Duration (Minutes)" name="duration" :value="$course->duration" type="number"
                        placeholder="300" />
                </div>
                <div class="col-xl-6 add_course_more_info_checkbox">
                    <x-form.checkbox name="qna" label="Q&A" :current="$course->qna" />
                    <x-form.checkbox name="certificate" label="Completion Certificate" :current="$course->certificate" />
                </div>
                <div class="col-12 add_course_more_info_input">
                    <label for="#">Category *</label>
                    <select class="select_2" name="category_id">
                        <option value=""> Please Select </option>
                        @foreach ($categories as $category)
                            @if ($category->subcategories->isNotEmpty())
                                <optgroup label="{{ $category->name }}">
                                    @foreach ($category->subcategories as $subcategory)
                                        <option
                                            {{ old('category_id', $current_category_id ?? '') == $subcategory->id ? 'selected' : '' }}
                                            value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                    @endforeach
                                </optgroup>
                            @endif
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                </div>
                <div class="col-xl-4 add_course_more_info_radio_box">
                    <x-form.radio name="course_level_id" :options="$levels" :selected="$course->course_level_id" label="Level" />
                </div>
                <div class="col-xl-4 add_course_more_info_radio_box">
                    <h3>Language</h3>
                    @foreach ($languages as $language)
                        <div class="form-check">
                            <input name="course_language_id" class="form-check-input" type="radio"
                                value="{{ $language->id }}"
                                {{ old('course_language_id', $current_language_id ?? '') == $language->id ? 'checked' : '' }}>
                            <label class="form-check-label" for="js-language-{{ $language->id }}">
                                {{ $language->name }}
                            </label>
                        </div>
                    @endforeach
                    <x-input-error :messages="$errors->get('course_language_id')" class="mt-2" />
                </div>
                <div class="col-xl-12">
                    <button type="submit" class="common_btn">Save</button>
                </div>
            </div>
        </form>
    </div>
</x-layouts.course-create-layout>

<x-layouts.course-create-layout>
    <div class="add_course_more_info">
        <form action="{{ route('instructor.courses.update.1') }}" id="js-course-update-2">
            @csrf
            <input type="hidden" value="{{ request()->course_id }}" name="course_id" id="id"/>
            <div class="row">
                <div class="col-xl-6">
                    <div class="add_course_more_info_input">
                        <x-form.input label="Capacity" name="capacity" type="number" placeholder="Capacity" />
                        <p>leave blank for unlimited</p>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="add_course_more_info_input">
                        <x-form.input label="Course Duration (Minutes)" name="duration" type="number" placeholder="300" />
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="add_course_more_info_checkbox">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">Q&A</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault2">
                            <label class="form-check-label" for="flexCheckDefault2">Completion
                                Certificate</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault3">
                            <label class="form-check-label" for="flexCheckDefault3">Patner
                                instructor</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault4">
                            <label class="form-check-label" for="flexCheckDefault4">Others</label>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="add_course_more_info_input">
                        <label for="#">Category *</label>
                        <select class="select_2" name="category_id">
                            <option value=""> Please Select </option>
                            @foreach ($categories as $category)
                                @if ($category->subcategories->isNotEmpty())
                                    <optgroup label="{{ $category->name }}">
                                        @foreach ($category->subcategories as $subcategory)
                                            <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                        @endforeach
                                    </optgroup>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="add_course_more_info_radio_box">
                        <h3>Level</h3>
                        @foreach ($levels as $level)
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="{{ $level->id }}" name="course_level_id"
                                    id="js-level-{{ $level->id }}" checked>
                                <label class="form-check-label" for="js-level-{{ $level->id }}">
                                    {{ $level->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="add_course_more_info_radio_box">
                        <h3>Language</h3>
                        @foreach ($languages as $language)
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="{{ $language->id }}" name="course_language_id"
                                    id="js-language-{{ $language->id }}">
                                <label class="form-check-label" for="js-language-{{ $language->id }}">
                                    {{ $language->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-xl-12">
                    <button type="submit" class="common_btn">Save</button>
                </div>
            </div>
        </form>
    </div>
</x-layouts.course-create-layout>

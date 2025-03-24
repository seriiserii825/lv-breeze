<x-layouts.course-create-layout>
    <div class="add_course_more_info">
        <form action="{{ route('instructor.courses.update', ['course' => request()->course->id, 'step' => 2]) }}"
            method="POST" id="js-course-edit-first">
            @csrf
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
                <div class="col-xl-6">
                    <x-form.checkbox name="qna" label="Q&A" :current="$course->qna" />
                    <x-form.checkbox name="certificate" label="Completion Certificate" :current="$course->certificate" />
                </div>
                <div class="col-12 add_course_more_info_input">
                    <x-form.select-group label="Category" name="category_id" :categories="$categories" :current-category-id="$course->category_id" />
                </div>
                <div class="col-xl-6">
                    <x-form.radio name="course_level_id" :options="$levels" :selected="$course->course_level_id" label="Level" />
                </div>
                <div class="col-xl-6">
                    <x-form.radio name="course_language_id" :options="$languages" :selected="$course->course_language_id" label="Language" />
                </div>
                <div class="col-xl-12">
                    <button type="submit" class="common_btn">Save</button>
                </div>
            </div>
        </form>
    </div>
</x-layouts.course-create-layout>

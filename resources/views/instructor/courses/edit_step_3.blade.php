<x-layouts.course-create-layout>
    <div class="add_course_content">
        <div class="flex-wrap add_course_content_btn_area d-flex justify-content-between">
            <a class="common_btn" id="js-add-new-chapter" href="{{ route('instructor.courses.modal-create-chapter', ['course_id' => $course->id]) }}">Add
                New Chapter</a>
            <a class="common_btn" href="#">Short Chapter</a>
        </div>
        <div class="accordion" id="accordionExample">
            @forelse($chapters as $k=>$chapter)
                <x-ui.accordion-item :k="$k" :chapter="$chapter" :course="$course" />
            @empty
                <div class="alert alert-info">No Chapters Found</div>
            @endforelse
        </div>
    </div>
    <!-- <x-modal.modal-edit-lesson :course="$course" /> -->
</x-layouts.course-create-layout>
<script charset="utf-8">

<x-modal.front-modal title="Create new Course Chapter" modal_id="js-course-chapter" apply_btn="js-create-chapter">
    <form method="POST" id="js-course-chapter-form" action="{{ route('instructor.course-chapters.store') }}">
        @csrf
        <x-form.input label="Title" placeholder="Enter Chapter Name" name="title" />
        <input type="hidden" value="{{ $course->id }}" name="course_id" id="course_id" />
    </form>
</x-modal.front-modal>

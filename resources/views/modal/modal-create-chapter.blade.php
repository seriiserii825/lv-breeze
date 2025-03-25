<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Create chapter</h5>
    </div>
    <div class="modal-body">
        <form method="POST" id="js-course-chapter-form" action="{{ route('instructor.course-chapters.store') }}">
            @csrf
            <x-form.input label="Title" placeholder="Enter Chapter Name" name="title" />
            <input type="hidden" value="{{ $course->id }}" name="course_id" id="course_id" />
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary " id="js-dynamic-modal-close"
                    data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Apply</button>
            </div>
        </form>
    </div>
</div>

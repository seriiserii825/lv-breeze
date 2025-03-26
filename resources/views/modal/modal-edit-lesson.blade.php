<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Edit lesson</h5>
    </div>
    <div class="modal-body">
        <form method="POST" id="js-course-update-lesson-form" action="{{ route('instructor.courses.update-lesson') }}">
            @csrf
            <input type="hidden" value="{{ $course->id }}" name="course_id" id="course_id" />
            <input type="hidden" value="{{ $chapter->id }}" name="chapter_id" id="chapter_id" />
            <input type="hidden" value="{{ $lesson->id }}" name="lesson_id" id="lesson_id" />
            <div class="row">
                <div class="col-md-6">
                    <x-form.input label="Title" :value="$lesson->title" placeholder="Enter Course Name" name="title" />
                </div>
                <div class="col-md-6 add_course_basic_info_imput">
                    <x-form.select label="File type"  :value="$lesson->file_type" name="file_type" :options="config('course.file_type')" :old="false" />
                </div>
                <div class="col-md-6 add_course_basic_info_imput">
                    <x-form.select label="Demo Video Storage" data_file="js-file-edit-lesson" data_input="js-input-edit-lesson" :value="$lesson->storage" name="demo_video_storage" :options="config('course.file_upload')"
                        :old="false" />
                </div>
                <div class="col-md-6 add_course_basic_info_imput">
                    <div id="js-file-edit-lesson">
                        <x-form.input-video label="Upload video file"  :value="$lesson->file_path" name="video_file" />
                    </div>
                    <div id="js-input-edit-lesson" class="d-none">
                        <x-form.input label="Input video source path" :value="$lesson->file_path" name="video_input" />
                    </div>
                </div>
                <div class="col-md-6">
                    <x-form.textarea label="Description" placeholder="Enter Description" :value="$lesson->description" name="description" />
                </div>
                <div class="col-md-3">
                    <x-form.switcher label="Is preview" :value="$lesson->is_preview" name="preview" />
                </div>
                <div class="col-md-3">
                    <x-form.switcher label="Downloadable"  :value="$lesson->downloadable" name="downloadable" />
                </div>
                <div class="col-md-6">
                    <x-form.input label="Duration" placeholder="Enter Duration" :value="$lesson->duration" type="number" name="duration" />
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="js-dynamic-modal-close"
                    data-bs-dismiss="modal">Close</button>
                <button type="button" id="js-update-lesson" class="btn btn-primary">Apply</button>
            </div>
        </form>
    </div>
</div>

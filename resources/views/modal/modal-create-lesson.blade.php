<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Create chapter</h5>
    </div>
    <div class="modal-body">
        <form method="POST" id="js-course-lesson-form" action="{{ route('instructor.courses.create-lesson') }}">
            @csrf
            <input type="hidden" value="{{ $course->id }}" name="course_id" id="course_id" />
            <div class="row">
                <div class="col-md-6">
                    <x-form.input label="Title" placeholder="Enter Course Name" name="title" />
                </div>
                <div class="col-md-6 add_course_basic_info_imput">
                    <x-form.select label="File type" name="file_type" :options="config('course.file_type')" :old="false" />
                </div>
                <div class="col-md-6 add_course_basic_info_imput">
                    <x-form.select label="Demo Video Storage" name="demo_video_storage" :options="config('course.file_upload')"
                        :old="false" />
                </div>
                <div class="col-md-6 add_course_basic_info_imput">
                    <div id="js-video-file">
                        <x-form.input-video label="Upload video file" name="video_file" />
                    </div>
                    <div id="js-video-input" class="d-none">
                        <x-form.input label="Input video source path" name="video_input" />
                    </div>
                </div>
                <div class="col-md-6">
                    <x-form.textarea label="Description" placeholder="Enter Description" name="description" />
                </div>
                <div class="col-md-3">
                    <x-form.switcher label="Is preview" name="preview" />
                </div>
                <div class="col-md-3">
                    <x-form.switcher label="Downloadable" name="downloadable" />
                </div>
                <div class="col-md-6">
                    <x-form.input label="Duration" placeholder="Enter Duration" name="duration" />
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="js-dynamic-modal-close"
                    data-bs-dismiss="modal">Close</button>
                <button type="button" id="js-store-lesson" class="btn btn-primary">Apply</button>
            </div>
        </form>
    </div>
</div>

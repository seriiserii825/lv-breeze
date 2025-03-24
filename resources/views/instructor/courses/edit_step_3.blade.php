<x-layouts.course-create-layout>
    <div class="add_course_content">
        <div class="flex-wrap add_course_content_btn_area d-flex justify-content-between">
            <a class="common_btn js-show-frontend-modal" href="#" data-modal="js-course-chapter">Add New Chapter</a>
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
    <x-modal.front-modal title="Create new Course Chapter" modal_id="js-course-chapter" apply_btn="js-create-chapter">
        <form method="POST" id="js-course-chapter-form" action="{{ route('instructor.course-chapters.store') }}">
            @csrf
            <x-form.input label="Title" placeholder="Enter Chapter Name" name="title" />
            <input type="hidden" value="{{ $course->id }}" name="course_id" id="course_id" />
        </form>
    </x-modal.front-modal>

    <x-modal.front-modal title="Create new lesson" modal_id="js-new-lesson-form" apply_btn="js-new-lesson-btn">
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
        </form>
    </x-modal.front-modal>
</x-layouts.course-create-layout>
<script charset="utf-8">
    const notyf = new Notyf({
        duration: 4000,
        position: {
            x: "right",
            y: "top",
        },
    });

    const apply_modal_btn = document.querySelector("#js-create-chapter");
    apply_modal_btn.addEventListener("click", (e) => {
        e.preventDefault();
        const form = document.querySelector("#js-course-chapter-form");
        const formData = new FormData(form);
        const url = form.getAttribute("action");
        fetch(url, {
                method: "POST",
                body: formData,
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute(
                        "content"),
                },
            })
            .then((response) => response.json())
            .then((data) => {
                if (data.status === "error") {
                    Object.values(data.errors).forEach((errors) => {
                        errors.forEach((err) => {
                            notyf.error(err);
                        });
                    });
                } else {
                    notyf.success(data.message);
                    setTimeout(() => {
                        window.location.reload();
                    }, 1000);
                }
                console.log(data);
            })
            .catch((error) => {
                if (error.errors) {
                    Object.values(error.errors).forEach((errors) => {
                        errors.forEach((err) => {
                            notyf.error(err);
                        });
                    });
                } else {
                    notyf.error(error.message);
                }
            });
    });
</script>
<script charset="utf-8">
    const create_lesson_btn = document.querySelector("#js-new-lesson-btn");
    create_lesson_btn.addEventListener("click", (e) => {
        e.preventDefault();
        const form = document.querySelector("#js-course-lesson-form");
        const url = form.getAttribute("action");
        const course_chapter_id = localStorage.getItem("course_chapter_id");
        const formData = new FormData(form);
        formData.append("chapter_id", course_chapter_id);
        fetch(url, {
                method: "POST",
                body: formData,
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute(
                        "content"),
                },
            })
            .then((response) => response.json())
            .then((data) => {
                console.log(data)
                if (data.status === "error") {
                    Object.values(data.errors).forEach((errors) => {
                        errors.forEach((err) => {
                            notyf.error(err);
                        });
                    });
                } else {
                    notyf.success(data.message);
                    setTimeout(() => {
                        window.location.reload();
                    }, 1000);
                }
                console.log(data);
            })
            .catch((error) => {
                if (error.errors) {
                    Object.values(error.errors).forEach((errors) => {
                        errors.forEach((err) => {
                            notyf.error(err);
                        });
                    });
                } else {
                    notyf.error(error.message);
                }
            });
    });
</script>

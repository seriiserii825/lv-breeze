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
        <form method="POST" id="js-course-chapter-form" action="{{ route('instructor.course-chapters.store') }}">
            @csrf
            <x-form.input label="Title" placeholder="Enter Chapter Name" name="title" />
            <input type="hidden" value="{{ $course->id }}" name="course_id" id="course_id" />
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
    console.log("create_lesson_btn", create_lesson_btn);
</script>

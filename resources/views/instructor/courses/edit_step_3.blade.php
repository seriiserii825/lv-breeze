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
    <x-modal.modal-create-chapter :course="$course" />
    <x-modal.modal-create-lesson :course="$course" />
    <x-modal.modal-edit-lesson :course="$course" />
</x-layouts.course-create-layout>
<script charset="utf-8">
    const btn_new_chapter = document.querySelector('#js-add-new-chapter');
    const create_chapter_route = btn_new_chapter.getAttribute('href');
    const modal = document.querySelector('#js-dynamic-modal');

    btn_new_chapter.addEventListener('click', (e) => {
        e.preventDefault();
        modal.style.display = "block";
        setTimeout(() => {
            modal.classList.add("show");
        }, 100);

        fetch(create_chapter_route)
            .then(response => response.text())
            .then(data => {
                const modal_dialog = modal.querySelector('.modal-dialog');
                modal_dialog.innerHTML = data;
                const modal_close = modal_dialog.querySelector('#js-dynamic-modal-close');
                modal_close.addEventListener('click', (e) => {
                    e.preventDefault();
                    modal.classList.remove("show");
                    setTimeout(() => {
                        modal.style.display = "none";
                    }, 300);
                });
            }).catch(error => {
                console.error('Error:', error);
            });
    });
</script>

<script charset="utf-8">
    document.addEventListener("DOMContentLoaded", function() {
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
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]')
                            .getAttribute(
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
    });
</script>

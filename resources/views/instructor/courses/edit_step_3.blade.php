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
    <!-- <x-modal.modal-create-chapter :course="$course" /> -->
    <!-- <x-modal.modal-create-lesson :course="$course" /> -->
    <!-- <x-modal.modal-edit-lesson :course="$course" /> -->
</x-layouts.course-create-layout>
<script charset="utf-8">
    // document.addEventListener("DOMContentLoaded", function() {
    //     const notyf = new Notyf({
    //         duration: 4000,
    //         position: {
    //             x: "right",
    //             y: "top",
    //         },
    //     });
    //
    //     const apply_modal_btn = document.querySelector("#js-create-chapter");
    //     apply_modal_btn.addEventListener("click", (e) => {
    //         e.preventDefault();
    //         const form = document.querySelector("#js-course-chapter-form");
    //         const formData = new FormData(form);
    //         const url = form.getAttribute("action");
    //         fetch(url, {
    //                 method: "POST",
    //                 body: formData,
    //                 headers: {
    //                     "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]')
    //                         .getAttribute(
    //                             "content"),
    //                 },
    //             })
    //             .then((response) => response.json())
    //             .then((data) => {
    //                 if (data.status === "error") {
    //                     Object.values(data.errors).forEach((errors) => {
    //                         errors.forEach((err) => {
    //                             notyf.error(err);
    //                         });
    //                     });
    //                 } else {
    //                     notyf.success(data.message);
    //                     setTimeout(() => {
    //                         window.location.reload();
    //                     }, 1000);
    //                 }
    //                 console.log(data);
    //             })
    //             .catch((error) => {
    //                 if (error.errors) {
    //                     Object.values(error.errors).forEach((errors) => {
    //                         errors.forEach((err) => {
    //                             notyf.error(err);
    //                         });
    //                     });
    //                 } else {
    //                     notyf.error(error.message);
    //                 }
    //             });
    //     });
    // });
</script>

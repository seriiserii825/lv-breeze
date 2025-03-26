import {notyf} from "../../modules/notifyPlugin";

export default function storeLesson() {
    const create_lesson_btn = document.querySelector("#js-store-lesson");
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
                "X-CSRF-TOKEN": document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content"),
            },
        })
            .then((response) => response.json())
            .then((data) => {
                console.log(data);
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
}

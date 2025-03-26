import {notyf} from "../../modules/notifyPlugin";

export default function storeChapter() {
    const apply_modal_btn = document.querySelector("#js-store-chapter");
    console.log("apply_modal_btn", apply_modal_btn);
    apply_modal_btn.addEventListener("click", (e) => {
        e.preventDefault();
        const form = document.querySelector("#js-course-chapter-form");
        const formData = new FormData(form);
        const url = form.getAttribute("action");
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

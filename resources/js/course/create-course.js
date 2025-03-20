const form = document.querySelector("#js-create-course-step-1");
const csrf_meta = document.querySelector('meta[name="csrf-token"]');
const csrf_token = csrf_meta.getAttribute("content");
const base_url = window.location.origin;
const step_1_url = base_url + "/instructor/courses";

form.addEventListener("submit", (e) => {
    e.preventDefault();
    const formData = new FormData(form);
    const form_data = Object.fromEntries(formData.entries());

    fetch(step_1_url, {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": csrf_token,
        },
        body: form_data,
    })
        .then((response) => response.json())
        .then((data) => {
            if (data.success) {
                console.log(data, "data");
            }
        }).catch((error) => {
            console.log(error, "error");
        });
});

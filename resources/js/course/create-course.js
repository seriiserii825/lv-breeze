const form = document.querySelector("#js-create-course-step-1");
const csrf_meta = document.querySelector('meta[name="csrf-token"]');
const csrf_token = csrf_meta.getAttribute("content");
const base_url = window.location.origin;
const step_1_url = base_url + "/instructor/courses";

form.addEventListener("submit", (e) => {
    e.preventDefault();

    const formData = new FormData(form);

    fetch(step_1_url, {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": csrf_token, // CSRF token for Laravel
            "accept": "application/json", // Accept JSON response
        },
        body: formData, // Do NOT convert to JSON when using FormData
    })
        .then((response) => response.json())
        .then((data) => {
            console.log(data, "data");
            if (data.success) {
                console.log(data, "data");
            }
        })
        .catch((error) => {
            console.log(error, "error");
        });
});

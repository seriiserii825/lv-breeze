const base_url = window.location.origin;
const form_2 = document.querySelector("#js-course-update-2");
const step_2_url = base_url + "/instructor/courses/update";
console.log("step_2_url", step_2_url);

if (form_2) {
    form_2.addEventListener("submit", (e) => {
        e.preventDefault();

        const formData = new FormData(form_2);

        fetch(step_2_url, {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": csrf_token, // CSRF token for Laravel
                accept: "application/json", // Accept JSON response
            },
            body: formData, // Do NOT convert to JSON when using FormData
        })
            .then((response) => response.json())
            .then((data) => {
                console.log(data, "data");
                // window.location.href = data.route;
            })
            .catch((error) => {
                console.log(error, "error");
                notyf.error(error.message);
            });
    });
}

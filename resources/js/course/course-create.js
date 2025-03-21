const form = document.querySelector("#js-create-course-step-1");
const csrf_meta = document.querySelector('meta[name="csrf-token"]');
const csrf_token = csrf_meta.getAttribute("content");
const base_url = window.location.origin;
const step_1_url = base_url + "/instructor/courses";

var notyf = new Notyf({
    duration: 6000,
    position: {
        x: "right",
        y: "top",
    },
});
if (form) {
    form.addEventListener("submit", (e) => {
        e.preventDefault();
        const formData = new FormData(form);

        fetch(step_1_url, {
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
                if (data.status === "success") {
                    notyf.success(data.message);
                    setTimeout(() => {
                        window.location.href = data.route;
                    }, 2000);
                } else {
                    notyf.error(data.message);
                }
            })
            .catch((error) => {
                notyf.success("Course created successfully!");
                notyf.error(error.message);
                console.log(error, "error");
            });
    });
}
//
// const form_2 = document.querySelector("#js-course-update-2");
// const step_2_url = base_url + "/instructor/courses/update";
//
// if (form_2) {
//     form_2.addEventListener("submit", (e) => {
//         e.preventDefault();
//
//         const formData = new FormData(form_2);
//
//         fetch(step_2_url, {
//             method: "POST",
//             headers: {
//                 "X-CSRF-TOKEN": csrf_token, // CSRF token for Laravel
//                 accept: "application/json", // Accept JSON response
//             },
//             body: formData, // Do NOT convert to JSON when using FormData
//         })
//             .then((response) => response.json())
//             .then((data) => {
//                 console.log(data, "data");
//                 // window.location.href = data.route;
//             })
//             .catch((error) => {
//                 console.log(error, "error");
//                 notyf.error(error.message);
//             });
//     });
// }

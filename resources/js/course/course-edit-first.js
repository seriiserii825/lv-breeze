// const csrf_meta = document.querySelector('meta[name="csrf-token"]');
// const csrf_token = csrf_meta.getAttribute("content");
// const base_url = window.location.origin;
// const form = document.querySelector("#js-course-edit-first");
// const url = base_url + "/instructor/courses/update/first";
// console.log("url", url);
//
// var notyf = new Notyf({
//     duration: 6000,
//     position: {
//         x: "right",
//         y: "top",
//     },
// });
//
// if (form) {
//     form.addEventListener("submit", (e) => {
//         e.preventDefault();
//
//         const formData = new FormData(form);
//
//         fetch(url, {
//             method: "POST",
//             headers: {
//                 "X-CSRF-TOKEN": csrf_token, // CSRF token for Laravel
//                 accept: "application/json", // Accept JSON response
//             },
//             body: formData, // Do NOT convert to JSON when using FormData
//         })
//             .then((response) => response.json())
//             .then((data) => {
//                 if (data.status === "success") {
//                     notyf.success(data.message);
//                     setTimeout(() => {
//                         window.location.href = data.route;
//                     }, 2000);
//                 } else {
//                     notyf.error(data.message);
//                 }
//             })
//             .catch((error) => {
//                 console.log(error, "error");
//                 notyf.error(error.message);
//             });
//     });
// }

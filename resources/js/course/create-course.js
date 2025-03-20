const form = document.querySelector("#js-create-course-step-1");

form.addEventListener("submit", (e) => {
    e.preventDefault();
    const formData = new FormData(form);
    const form_data = Object.fromEntries(formData.entries());

    console.log("form_data", form_data);
});

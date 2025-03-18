const show_modal_btn = document.querySelectorAll(".js-show-modal");
const modal = document.querySelector("#js-modal");
const close_modal_btn = document.querySelector("#js-modal-close");
const close_modal_icon = document.querySelector("#js-modal-close-icon");
const apply_modal_btn = document.querySelector("#js-modal-apply");

show_modal_btn.forEach((btn) => {
    btn.addEventListener("click", (e) => {
        e.preventDefault();
        modal.style.display = "block";
        setTimeout(() => {
            modal.classList.add("show");
        }, 100);
    });
});

close_modal_btn.addEventListener("click", (e) => {
    e.preventDefault();
    modal.classList.remove("show");
    setTimeout(() => {
        modal.style.display = "none";
    }, 300);
});


close_modal_icon.addEventListener("click", (e) => {
    e.preventDefault();
    modal.classList.remove("show");
    setTimeout(() => {
        modal.style.display = "none";
    }, 300);
});

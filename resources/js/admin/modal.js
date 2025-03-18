const show_modal_btn = document.querySelectorAll(".js-show-modal");
const modal = document.querySelector("#js-modal");
const close_modal_btn = document.querySelector("#js-modal-close");
const close_modal_icon = document.querySelector("#js-modal-close-icon");
const apply_modal_btn = document.querySelector("#js-modal-apply");

const csrf_token = document.querySelector('meta[name="csrf-token"]').content;
let url = "";

show_modal_btn.forEach((btn) => {
    btn.addEventListener("click", (e) => {
        e.preventDefault();
        url = btn.getAttribute("href");
        modal.style.display = "block";
        setTimeout(() => {
            modal.classList.add("show");
        }, 100);
    });
});

apply_modal_btn.addEventListener("click", (e) => {
    e.preventDefault();

    fetch(url, {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": csrf_token,
        },
        body: JSON.stringify({
            _method: "DELETE",
        }),
    })
        .then((response) => response.json())
        .then((data) => {
            console.log(data, "data");
            closeModal();
            window.location.reload();
        })
        .catch((error) => {
            console.error("Error:", error);
        });

    // closeModal();
});

close_modal_btn.addEventListener("click", (e) => {
    e.preventDefault();
    closeModal();
});

close_modal_icon.addEventListener("click", (e) => {
    e.preventDefault();
    closeModal();
});

function closeModal() {
    modal.classList.remove("show");
    setTimeout(() => {
        modal.style.display = "none";
    }, 300);
}

export default function closeModal(modal_dialog, modal) {
    const modal_close = modal_dialog.querySelector("#js-dynamic-modal-close");
    modal_close.addEventListener("click", (e) => {
        e.preventDefault();
        modal.classList.remove("show");
        setTimeout(() => {
            modal.style.display = "none";
        }, 300);
    });
}

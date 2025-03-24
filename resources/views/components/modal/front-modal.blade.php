<div class="modal fade" id="js-front-modal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete item</h5>
                <button type="button" id="js-front-modal-close-icon" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body"> Are you sure you want to delete this item? </div>
            <div class="modal-footer">
                <button type="button" id="js-front-modal-close" class=" btn btn-secondary"
                    data-bs-dismiss="modal">Close</button>
                <button type="button" id="js-front-modal-apply" class="js-modal-apply btn btn-primary">Apply</button>
            </div>
        </div>
    </div>
</div>
<script>
    const show_modal_btn = document.querySelectorAll(".js-show-frontend-modal");
    const modal = document.querySelector("#js-front-modal");
    const close_modal_btn = document.querySelector("#js-front-modal-close");
    const close_modal_icon = document.querySelector("#js-front-modal-close-icon");
    const apply_modal_btn = document.querySelector("#js-front-modal-apply");

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
</script>

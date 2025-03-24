<div class="modal fade" id="js-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete item</h5>
                <button type="button" id="js-modal-close-icon" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body"> Are you sure you want to delete this item? </div>
            <div class="modal-footer">
                <button type="button" id="js-modal-close" class=" btn btn-secondary"
                    data-bs-dismiss="modal">Close</button>
                <button type="button" id="js-modal-apply" class="js-modal-apply btn btn-primary">Apply</button>
            </div>
        </div>
    </div>
</div>
<script charset="utf-8">
const open_modal_btn = document.querySelectorAll(".js-show-modal");
const modal = document.querySelector("#js-modal");
const close_modal_btn = document.querySelector("#js-modal-close");
const close_modal_icon = document.querySelector("#js-modal-close-icon");
const modal_btn = document.querySelector("#js-modal-apply");

const csrf_token = document.querySelector('meta[name="csrf-token"]').content;
let url = "";
var notyf = new Notyf();

open_modal_btn.forEach((btn) => {
    btn.addEventListener("click", (e) => {
        e.preventDefault();
        url = btn.getAttribute("href");
        modal.style.display = "block";
        setTimeout(() => {
            modal.classList.add("show");
        }, 100);
    });
});

modal_btn.addEventListener("click", (e) => {
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
            notyf.error(`error: ${error}`);
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
</script>

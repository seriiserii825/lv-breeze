import closeModal from "../../helpers/closeModal";
import storeChapter from "./storeChapter";

export default function createChapter() {
    const btn_new_chapter = document.querySelector("#js-add-new-chapter");
    const create_chapter_route = btn_new_chapter.getAttribute("href");
    const modal = document.querySelector("#js-dynamic-modal");

    btn_new_chapter.addEventListener("click", (e) => {
        e.preventDefault();
        modal.style.display = "block";
        setTimeout(() => {
            modal.classList.add("show");
        }, 100);

        fetch(create_chapter_route)
            .then((response) => response.text())
            .then((data) => {
                const modal_dialog = modal.querySelector(".modal-dialog");
                modal_dialog.innerHTML = data;
                storeChapter();
                closeModal(modal_dialog, modal)
            })
            .catch((error) => {
                console.error("Error:", error);
            });
    });
}

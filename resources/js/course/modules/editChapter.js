import closeModal from "../../helpers/closeModal";
import updateChapter from "./updateChapter";

export default function editChapter() {
    const btn_new_chapter_all = document.querySelectorAll(
        ".js-edit-chapter-btn"
    );

    btn_new_chapter_all.forEach((btn_new_chapter) => {
        btn_new_chapter.addEventListener("click", (e) => {
            e.preventDefault();
            const edit_chapter_route = btn_new_chapter.getAttribute("href");
            console.log("edit_chapter_route", edit_chapter_route);
            const modal = document.querySelector("#js-dynamic-modal");
            modal.style.display = "block";
            setTimeout(() => {
                modal.classList.add("show");
            }, 100);

            fetch(edit_chapter_route)
                .then((response) => response.text())
                .then((data) => {
                    const modal_dialog = modal.querySelector(".modal-dialog");
                    modal_dialog.innerHTML = data;
                    updateChapter();
                    closeModal(modal_dialog, modal)
                })
                .catch((error) => {
                    console.error("Error:", error);
                });
        });
    });
}

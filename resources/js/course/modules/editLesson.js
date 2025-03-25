import toggleFileInput from "../../form/toggleFileInput";
import closeModal from "../../helpers/closeModal";
import storeLesson from "./storeLesson";

export default function editLesson() {
    const btn_new_lesson_all = document.querySelectorAll(
        ".js-edit-lesson-btn"
    );

    btn_new_lesson_all.forEach((btn) => {
        btn.addEventListener("click", (e) => {
            e.preventDefault();
            const modal = document.querySelector("#js-dynamic-modal");
            modal.style.display = "block";
            setTimeout(() => {
                modal.classList.add("show");
                const route = btn.getAttribute("href");
                console.log("route", route);
                fetch(route)
                    .then((response) => response.text())
                    .then((data) => {
                        // console.log(data, "data");
                        const modal_dialog =
                            modal.querySelector(".modal-dialog");
                        modal_dialog.innerHTML = data;
                        // storeLesson();
                        // toggleFileInput();
                        closeModal(modal_dialog, modal)
                    })
                    .catch((error) => {
                        console.error("Error:", error);
                    });
            }, 100);
        });
    });
}

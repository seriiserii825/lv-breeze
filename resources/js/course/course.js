import createChapter from "./modules/createChapter";
document.addEventListener("DOMContentLoaded", function () {
    const btn_new_chapter = document.querySelector("#js-add-new-chapter");
    if (btn_new_chapter) {
        createChapter();
    }
});

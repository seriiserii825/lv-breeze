import toggleFileInput from "../form/toggleFileInput";
import createChapter from "./modules/createChapter";
import createLesson from "./modules/createLesson";
import editLesson from "./modules/editLesson";
document.addEventListener("DOMContentLoaded", function () {
    const btn_new_chapter = document.querySelector("#js-add-new-chapter");
    if (btn_new_chapter) {
        createChapter();
        createLesson();
        editLesson();
    }

    const create_course = document.querySelector('.create-course');
    if(create_course) {
        toggleFileInput();
    }
});

import toggleFileInput from "../form/toggleFileInput";
import createChapter from "./modules/createChapter";
import createLesson from "./modules/createLesson";
import editChapter from "./modules/editChapter";
import editLesson from "./modules/editLesson";
document.addEventListener("DOMContentLoaded", function () {
    const btn_new_chapter = document.querySelector("#js-add-new-chapter");
    if (btn_new_chapter) {
        createChapter();
        editChapter();
        createLesson();
        editLesson();
    }

    const create_course = document.querySelector('.create-course');
    if(create_course) {
        toggleFileInput();
    }
});

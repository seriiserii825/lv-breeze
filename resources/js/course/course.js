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

    const select = document.querySelector('select[name="demo_video_storage"]');
    if(select) {
        toggleFileInput();
    }
});

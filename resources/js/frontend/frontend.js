import delItem from "./modules/delItem";

document.addEventListener("DOMContentLoaded", () => {
    const del_item = document.querySelector(".js-delete-item");
    if (del_item) {
        delItem();
    }
});

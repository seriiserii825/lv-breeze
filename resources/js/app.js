import './bootstrap';

import Alpine from 'alpinejs';
import delItem from './frontend/modules/delItem';

window.Alpine = Alpine;

Alpine.start();


document.addEventListener("DOMContentLoaded", () => {
    const del_item = document.querySelector(".js-delete-item");
    if (del_item) {
        delItem(del_item);
    }
});

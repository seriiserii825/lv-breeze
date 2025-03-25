export default function toggleFileInput() {
    const select_html = document.querySelector(
        'select[name="demo_video_storage"]'
    );
    const select_all = document.querySelectorAll(
        'select[name="demo_video_storage"]'
    );
    if (select_html) {
        select_all.forEach((select) => {
            select.addEventListener("change", function () {
                changeSelect(select);
            });
            changeSelect(select);
        });
    }

    function changeSelect(select) {
        const value = select.value;
        const file_attr = select.getAttribute("data-file");
        const videoFile = document.querySelector(`#${file_attr}`);
        const input_attr = select.getAttribute("data-input");
        const videoInput = document.querySelector(`#${input_attr}`);
        if (value === "upload") {
            videoFile.classList.remove("d-none");
            videoInput.classList.add("d-none");
            videoInput.querySelector("input").value = "";
        } else {
            videoFile.classList.add("d-none");
            videoInput.classList.remove("d-none");
            videoFile.querySelector("input").value = "";
        }
    }
}

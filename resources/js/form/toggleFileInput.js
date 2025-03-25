export default function toggleFileInput() {
    const select = document.querySelector('select[name="demo_video_storage"]');
    if (select) {
        select.addEventListener("change", changeSelect);
        changeSelect();
    }

    function changeSelect() {
        const value = select.value;
        const videoFile = document.querySelector("#js-video-file");
        const videoInput = document.querySelector("#js-video-input");
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

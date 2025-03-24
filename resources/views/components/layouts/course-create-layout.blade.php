<x-layouts.front-user-layout title="Student Create Course">
    <div class="wsus__dashboard_contant">
        <div class="wsus__dashboard_contant_top">
            <div class="relative wsus__dashboard_heading">
                <h5>Add Courses</h5>
                <p>Manage your courses and its update like live, draft and insight.</p>
            </div>
        </div>

        <div class="dashboard_add_courses">
            @if (request()->course)
                <x-course.course-create-tabs />
            @endif
            <div class="tab-content" id="pills-tabContent">
                {{ $slot }}
            </div>
        </div>
    </div>
</x-layouts.front-user-layout>
<script charset="utf-8">
    const select = document.querySelector('select[name="demo_video_storage"]');
    if (select) {
        select.addEventListener('change', changeSelect);
        changeSelect();
    }

    function changeSelect() {
        const value = select.value;
        const videoFile = document.querySelector('#js-video-file');
        const videoInput = document.querySelector('#js-video-input');
        if (value === 'upload') {
            videoFile.classList.remove('d-none');
            videoInput.classList.add('d-none');
            videoInput.querySelector('input').value = '';
        } else {
            videoFile.classList.add('d-none');
            videoInput.classList.remove('d-none');
            videoFile.querySelector('input').value = '';
        }
    }
</script>

<script>
    const show_modal_btn = document.querySelectorAll(".js-show-frontend-modal");
    const close_modal_btns = document.querySelectorAll(".js-front-modal-close");
    let modal = null;

    show_modal_btn.forEach((btn) => {
        btn.addEventListener("click", (e) => {
            e.preventDefault();
            const data_chapter_id = btn.getAttribute("data-chapter-id");
            localStorage.setItem("course_chapter_id", data_chapter_id);
            const modal_elem = btn.getAttribute("data-modal");
            modal = document.querySelector('#' + modal_elem);
            e.preventDefault();
            url = btn.getAttribute("href");
            modal.style.display = "block";
            setTimeout(() => {
                modal.classList.add("show");
            }, 100);
        });
    });

    close_modal_btns.forEach((btn) => {
        btn.addEventListener("click", (e) => {
            e.preventDefault();
            closeModal();
        });
    });

    function closeModal() {
        modal.classList.remove("show");
        setTimeout(() => {
            modal.style.display = "none";
        }, 300);
    }
</script>

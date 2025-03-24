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
    const select = document.querySelector('select[name="demo_video_storage"]') as HTMLSelectElement;
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

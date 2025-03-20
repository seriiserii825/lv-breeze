<x-layouts.front-user-layout title="Student Create Course">
    <div class="wsus__dashboard_contant">
        <div class="wsus__dashboard_contant_top">
            <div class="relative wsus__dashboard_heading">
                <h5>Add Courses</h5>
                <p>Manage your courses and its update like live, draft and insight.</p>
            </div>
        </div>

        <div class="dashboard_add_courses">
            <x-course.course-create-tabs />
            <div class="tab-content" id="pills-tabContent">
                {{ $slot }}
            </div>
        </div>
    </div>
</x-layouts.front-user-layout>

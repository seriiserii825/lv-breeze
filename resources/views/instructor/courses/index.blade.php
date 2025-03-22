<x-layouts.front-user-layout title="Instructor Courses">
    <div class="wsus__dashboard_contant">
        <div class="wsus__dashboard_contant_top">
            <div class="relative wsus__dashboard_heading">
                <h5>Courses</h5>
                <p>Manage your courses and its update like live, draft and insight.</p>
                <a class="common_btn" href="{{ route('instructor.courses.create') }}">+ add course</a>
            </div>
        </div>

        <form action="#" class="wsus__dash_course_searchbox">
            <div class="input">
                <input type="text" placeholder="Search our Courses">
                <button><i class="far fa-search"></i></button>
            </div>
            <div class="selector">
                <select class="select_js">
                    <option value="">Choose</option>
                    <option value="">Choose 1</option>
                    <option value="">Choose 2</option>
                </select>
            </div>
        </form>

        <div class="wsus__dash_course_table">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="image">
                                        COURSES
                                    </th>
                                    <th class="details">

                                    </th>
                                    <th class="sale">
                                        STUDENT
                                    </th>
                                    <th class="status">
                                        STATUS
                                    </th>
                                    <th class="action">
                                        ACTION
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($courses as $course)
                                    <tr>
                                        <td class="image">
                                            <div class="image_category">
                                                <img src="images/courses_3_img_3.jpg" alt="img"
                                                    class="img-fluid w-100">
                                            </div>
                                        </td>
                                        <td class="details">
                                            <p class="rating">
                                                <i class="fas fa-star" aria-hidden="true"></i>
                                                <i class="fas fa-star" aria-hidden="true"></i>
                                                <i class="fas fa-star" aria-hidden="true"></i>
                                                <i class="fas fa-star-half-alt" aria-hidden="true"></i>
                                                <i class="far fa-star" aria-hidden="true"></i>
                                                <span>(5.0)</span>
                                            </p>
                                            <a class="title" href="{{ $course->slug }}">{{ $course->title }}({{ $course->id }})</a>
                                        </td>
                                        <td class="sale">
                                            <p>34</p>
                                        </td>
                                        <td class="status">
                                            <p class="delete">Deleted</p>
                                        </td>
                                        <td class="action">
                                            <a class="edit" href="{{ route('instructor.courses.edit', ['course' => $course->id, 'step' => 1]) }}"><i
                                                    class="far fa-edit"></i></a>
                                            <a class="del" href="#"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No courses found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.front-user-layout>

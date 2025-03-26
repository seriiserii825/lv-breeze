@props(['course', 'chapter', 'k'])
<div class="accordion-item">
    <h2 class="accordion-header">
        <button
                class="accordion-button"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#js-chapter-{{ $k }}"
                aria-expanded="true"
                aria-controls="js-chapter-{{ $k }}">
            <span>{{ $chapter->title }}</span>
        </button>
        <div class="add_course_content_action_btn">
            <div class="dropdown">
                <div
                        class="btn btn-secondary dropdown-toggle"
                        type="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false">
                    <i class="far fa-plus"></i>
                </div>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a
                                class="dropdown-item js-create-lesson-btn"
                                href="{{ route('instructor.courses.modal-create-lesson', ['course_id' => $course->id, 'chapter_id' => $chapter->id]) }}">Add
                            Lesson</a></li>
                    <li><a
                                class="dropdown-item"
                                href="#">Add Document</a>
                    </li>
                    <li><a
                                class="dropdown-item"
                                href="#">Add Quiz</a></li>
                </ul>
            </div>
            <a
                    title="Edit"
                    class="edit js-edit-chapter-btn"
                    href="{{ route('instructor.course-chapters.edit', ['course_id' => $course->id, 'course_chapter' => $chapter]) }}"><i class="far fa-edit"></i></a>
            <a
                    title="Delete"
                    class="del js-delete-item"
                    href="{{ route('instructor.course-chapters.destroy', ['course_chapter' => $chapter]) }}"><i class="fas fa-trash-alt"></i></a>
        </div>
    </h2>
    <div
            id="js-chapter-{{ $k }}"
            class="accordion-collapse collapse"
            data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <ul class="item_list">
                @forelse($chapter->lessons as $lesson)
                    <li>
                        <span>{{ $lesson->title }}</span>
                        <div class="add_course_content_action_btn">
                            <a
                                    title="Edit"
                                    class="edit js-show-frontend-modal js-edit-lesson-btn"
                                    href="{{ route('instructor.courses.modal-edit-lesson', [
                                'course_id' => $course->id,
                                'lesson_id' => $lesson->id,
                                'chapter_id' => $chapter->id
                            ]) }}"><i class="far fa-edit"></i></a>
                            <a
                                    class="del js-delete-item"
                                    title="Delete"
                                    href="{{ route('instructor.courses.delete-lesson', $lesson->id) }}"><i class="fas fa-trash-alt"></i></a>
                            <a
                                    class="arrow"
                                    href="#"><i class="fas fa-arrows-alt"></i></a>
                        </div>
                    </li>
                @empty
                    <li class="text-danger">No Lessons Found</li>
                @endforelse
            </ul>
        </div>
    </div>
</div>

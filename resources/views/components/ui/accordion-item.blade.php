@props(['course', 'chapter', 'k'])
<div class="accordion-item">
    <h2 class="accordion-header">
        <button class="accordion-button" type="button" data-bs-toggle="collapse"
            data-bs-target="#js-chapter-{{ $k }}" aria-expanded="true"
            aria-controls="js-chapter-{{ $k }}">
            <span>{{ $chapter->title }}</span>
        </button>
        <div class="add_course_content_action_btn">
            <div class="dropdown">
                <div class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="far fa-plus"></i>
                </div>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="#">Add Lesson</a>
                    </li>
                    <li><a class="dropdown-item" href="#">Add Document</a>
                    </li>
                    <li><a class="dropdown-item" href="#">Add Quiz</a></li>
                </ul>
            </div>
            <a class="edit" href="#"><i class="far fa-edit"></i></a>
            <form class="d-inline-flex align-items-center"
                action="{{ route('instructor.course-chapters.destroy', ['course_id' => $course->id, 'course_chapter' => $chapter]) }}"
                method="post" accept-charset="utf-8">
                @csrf
                @method('DELETE')
                <button type="submit" class="del" href="#"><i
                        class="fas fa-trash-alt"></i></button>
            </form>
        </div>
    </h2>
    <div id="js-chapter-{{ $k }}" class="accordion-collapse collapse"
        data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <ul class="item_list">
                <li>
                    <span>Aut autem dolorem debitis mollitia.</span>
                    <div class="add_course_content_action_btn">
                        <a class="edit" href="#"><i class="far fa-edit"></i></a>
                        <a class="del" href="#"><i class="fas fa-trash-alt"></i></a>
                        <a class="arrow" href="#"><i class="fas fa-arrows-alt"></i></a>
                    </div>
                </li>
            </ul>
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#flush-js-chapter-{{ $k }}" aria-expanded="false"
                            aria-controls="flush-js-chapter-{{ $k }}">
                            <span>Accordion Item #1</span>
                        </button>
                        <div class="add_course_content_action_btn">
                            <div class="dropdown">
                                <div class="btn btn-secondary dropdown-toggle" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="far fa-plus"></i>
                                </div>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="#">Add Lesson</a>
                                    </li>
                                    <li><a class="dropdown-item" href="#">Add Document</a>
                                    </li>
                                    <li><a class="dropdown-item" href="#">Add Quiz</a></li>
                                </ul>
                            </div>
                            <a class="edit" href="#"><i class="far fa-edit"></i></a>
                            <a class="del" href="#"><i class="fas fa-trash-alt"></i></a>
                        </div>
                    </h2>
                    <div id="flush-js-chapter-{{ $k }}" class="accordion-collapse collapse"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Placeholder content for
                            this accordion, which is intended to demonstrate
                            the <code>.accordion-flush</code> class. This is
                            the first item's accordion body.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<x-layouts.course-create-layout>
    <div class="add_course_content">
        <div class="flex-wrap add_course_content_btn_area d-flex justify-content-between">
            <a class="common_btn js-show-frontend-modal" href="#">Add New Chapter</a>
            <a class="common_btn" href="#">Short Chapter</a>
        </div>
        <div class="accordion" id="accordionExample">
            @forelse($chapters as $k=>$chapter)
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
                            <a class="del" href="#"><i class="fas fa-trash-alt"></i></a>
                        </div>
                    </h2>
                    <div id="js-chapter-{{ $k }}" class="accordion-collapse collapse show"
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
            @empty
                <div class="alert alert-info">No Chapters Found</div>
            @endforelse
        </div>
    </div>
    <x-modal.front-modal title="Create new Course Chapter" id="js-course-chapter">
        <form method="POST" id="js-course-chapter-form" action="{{ route('instructor.course-chapters.store') }}">
            @csrf
            <x-form.input label="Title" placeholder="Enter Chapter Name" name="title" />
            <input type="hidden" value="{{ $course->id }}" name="course_id" id="course_id" />
        </form>
    </x-modal.front-modal>
</x-layouts.course-create-layout>
<script charset="utf-8">
    const notyf = new Notyf({
        duration: 4000,
        position: {
            x: "right",
            y: "top",
        },
    });

    const modal_apply_btn = document.querySelector("#js-front-modal-apply");
    apply_modal_btn.addEventListener("click", (e) => {
        e.preventDefault();
        const form = document.querySelector("#js-course-chapter-form");
        const formData = new FormData(form);
        const url = form.getAttribute("action");
        fetch(url, {
                method: "POST",
                body: formData,
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute(
                        "content"),
                },
            })
            .then((response) => response.json())
            .then((data) => {
                if (data.status === "error") {
                    Object.values(data.errors).forEach((errors) => {
                        errors.forEach((err) => {
                            notyf.error(err);
                        });
                    });
                } else {
                    notyf.success(data.message);
                    setTimeout(() => {
                        window.location.reload();
                    }, 1000);
                }
                console.log(data);
            })
            .catch((error) => {
                if (error.errors) {
                    Object.values(error.errors).forEach((errors) => {
                        errors.forEach((err) => {
                            notyf.error(err);
                        });
                    });
                } else {
                    notyf.error(error.message);
                }
            });
    });
</script>

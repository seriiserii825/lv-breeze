<x-layouts.course-create-layout>
    <div class="tab-pane fade show active create-course" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
        <div class="add_course_basic_info">
            <form action="{{ route('instructor.courses.store') }}" method="post" id="js-create-course-step-1"
                enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-xl-12 add_course_basic_info_imput">
                        <x-form.input label="Title" name="title" placeholder="Title" />
                    </div>
                    <div class="col-xl-12 add_course_basic_info_imput">
                        <x-form.input label="Seo description" name="seo_description" placeholder="Seo description" />
                    </div>
                    <div class="col-xl-12 add_course_basic_info_imput">
                        <x-form.input-file label="Thumbnail" name="thumbnail" />
                    </div>
                    <div class="col-xl-6 add_course_basic_info_imput">
                        <x-form.select label="Demo Video Storage"  data_file="js-file-create-course" data_input="js-input-create-course" name="demo_video_storage" :options="$enum_values"
                            :old="false" />
                    </div>
                    <div class="col-xl-6 add_course_basic_info_imput">
                        <div id="js-file-create-course">
                            <x-form.input-video label="Upload video file" name="video_file" />
                        </div>
                        <div id="js-input-create-course" class="d-none">
                            <x-form.input label="Input video source path" name="video_input" />
                        </div>
                    </div>
                    <div class="col-xl-6 add_course_basic_info_imput">
                        <x-form.input label="Price" name="price" placeholder="Price" />
                        <p>Put 0 for free</p>
                    </div>
                    <div class="col-xl-6 add_course_basic_info_imput">
                        <x-form.input label="Discount Price" name="discount" type="number"
                            placeholder="Discount Price" />
                    </div>
                    <div class="mb-0 col-xl-12 add_course_basic_info_imput">
                        <x-form.textarea label="Description" name="description" placeholder="Description" />
                        <button type="submit" class="common_btn mt_20">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-layouts.course-create-layout>

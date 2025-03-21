<x-layouts.course-create-layout>
    <div class="add_course_more_info">
        <form action="#">
            <div class="row">
                <div class="col-xl-6">
                    <div class="add_course_more_info_input">
                        <x-form.input label="Capacity" name="capacity" placeholder="Capacity" />
                        <p>leave blank for unlimited</p>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="add_course_more_info_input">
                        <x-form.input label="Course Duration (Minutes)" name="duration" placeholder="300" />
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="add_course_more_info_checkbox">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">Q&A</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault2">
                            <label class="form-check-label" for="flexCheckDefault2">Completion
                                Certificate</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault3">
                            <label class="form-check-label" for="flexCheckDefault3">Patner
                                instructor</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault4">
                            <label class="form-check-label" for="flexCheckDefault4">Others</label>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="add_course_more_info_input">
                        <label for="#">Category *</label>
                        <select class="select_2">
                            <option value=""> Please Select </option>
                            @foreach ($categories as $category)
                                @if ($category->subcategories->isNotEmpty())
                                    <optgroup label="{{ $category->name }}">
                                        @foreach ($category->subcategories as $subcategory)
                                            <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                        @endforeach
                                    </optgroup>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="add_course_more_info_radio_box">
                        <h3>Level</h3>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                id="flexRadioDefault1" checked>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Beginner
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                id="flexRadioDefault2">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Intermediate
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                id="flexRadioDefault3">
                            <label class="form-check-label" for="flexRadioDefault3">
                                Expert
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                id="flexRadioDefault4">
                            <label class="form-check-label" for="flexRadioDefault4">
                                Expert
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="add_course_more_info_radio_box">
                        <h3>Language</h3>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault1"
                                id="flexRadioDefault11" checked>
                            <label class="form-check-label" for="flexRadioDefault11">
                                English
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault1"
                                id="flexRadioDefault12">
                            <label class="form-check-label" for="flexRadioDefault12">
                                Hindi
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault1"
                                id="flexRadioDefault13">
                            <label class="form-check-label" for="flexRadioDefault13">
                                Arabic
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault1"
                                id="flexRadioDefault14">
                            <label class="form-check-label" for="flexRadioDefault14">
                                Francais
                            </label>
                        </div>

                    </div>
                </div>
                <div class="col-xl-12">
                    <button type="submit" class="common_btn">Save</button>
                </div>
            </div>
        </form>
    </div>
</x-layouts.course-create-layout>

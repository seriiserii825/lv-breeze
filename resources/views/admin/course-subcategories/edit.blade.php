<x-layouts.admin-layout>
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <span>Edit subcategory {{ $subcategory->name }} from {{ $course_category->name }}</span>
            <a href="{{ route('admin.course-subcategories.index', $course_category->id) }}" class="btn btn-primary">Back</a>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.course-subcategories.update', [
                'course_category' => $course_category->id,
                'subcategory' => $subcategory->id,
            ]) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="mb-3 col-md-4">
                        <x-form.input-file name="image" label="Image" :value="$subcategory->image"/>
                    </div>
                    <div class="mb-3 col-md-4">
                        <x-form.input name="name" label="Name" :value="$subcategory->name" />
                    </div>
                    <div class="mb-3 col-md-4">
                        <x-form.input name="icon" label="Icon" :value="$subcategory->icon" />
                        <x-utils.link-to-fontawesome />
                    </div>
                    <div class="mb-3 col-md-2">
                        <x-form.switcher name="show_at_tranding" label="Show at tranding" :value="$subcategory->show_at_tranding === 1" />
                    </div>
                    <div class="mb-3 col-md-2">
                        <x-form.switcher name="status" label="Status"  :value="$subcategory->status === 1" />
                    </div>
                </div>
                <button class="mt-4 btn btn-primary" type="submit">Submit</button>
            </form>
        </div>
    </div>
</x-layouts.admin-layout>

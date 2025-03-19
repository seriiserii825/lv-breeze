<x-layouts.admin-layout>
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <span>Edit category</span>
            <a href="{{ route('admin.course-categories.index') }}" class="btn btn-primary">Back</a>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.course-categories.update', $course_category->id) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="mb-3 col-md-4">
                        <x-form.input-file name="image" label="Image" :value="$course_category->image"/>
                    </div>
                    <div class="mb-3 col-md-4">
                        <x-form.input name="name" label="Name" :value="$course_category->name" />
                    </div>
                    <div class="mb-3 col-md-4">
                        <x-form.input name="icon" label="Icon" :value="$course_category->icon" />
                        <x-utils.link-to-fontawesome />
                    </div>
                    <div class="mb-3 col-md-4">
                        <x-form.select name="parent_id" label="Parent category" :options="$categories" />
                    </div>
                    <div class="mb-3 col-md-2">
                        <x-form.switcher name="show_at_tranding" label="Show at tranding" :value="$course_category->show_at_tranding === 1" />
                    </div>
                    <div class="mb-3 col-md-2">
                        <x-form.switcher name="status" label="Status"  :value="$course_category->status === 1" />
                    </div>
                </div>
                <button class="mt-4 btn btn-primary" type="submit">Submit</button>
            </form>
        </div>
    </div>
</x-layouts.admin-layout>

<x-layouts.admin-layout>
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <span>New category</span>
            <a href="{{ route('admin.course-categories.index') }}" class="btn btn-primary">Back</a>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.course-categories.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="mb-3 col-md-4">
                        <x-form.input name="name" label="Name" />
                    </div>
                    <div class="mb-3 col-md-4">
                        <x-form.input-file name="image" label="Image" />
                    </div>
                    <div class="mb-3 col-md-4">
                        <x-form.input name="icon" label="Icon" />
                        <x-utils.link-to-fontawesome />
                    </div>
                    <div class="mb-3 col-md-4">
                        <x-form.select name="parent_id" label="Parent category" :options="$categories" />
                    </div>
                    <div class="mb-3 col-md-2">
                        <x-form.switcher name="show_at_tranding" label="Show at tranding" />
                    </div>
                    <div class="mb-3 col-md-2">
                        <x-form.switcher name="status" label="Status" :value="1" />
                    </div>
                </div>
                <button class="mt-4 btn btn-primary" type="submit">Submit</button>
            </form>
        </div>
    </div>
</x-layouts.admin-layout>

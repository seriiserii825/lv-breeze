<x-layouts.admin-layout>
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <span>New category</span>
            <a href="{{ route('admin.course-categories.index') }}" class="btn btn-primary">Back</a>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.course-categories.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <x-form.input name="name" label="Name" />
                </div>
                <button class="btn btn-primary" type="submit">Submit</button>
            </form>
        </div>
    </div>
</x-layouts.admin-layout>

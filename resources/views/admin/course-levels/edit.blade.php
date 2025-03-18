<x-layouts.admin-layout>
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <span>Edit level</span>
            <a href="{{ route('admin.course-levels.index') }}" class="btn btn-primary">Back</a>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.course-levels.update', $course_level->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <x-form.input name="name" label="Name" :value="$course_level->name" />
                </div>
                <button class="btn btn-primary" type="submit">Update</button>
            </form>
        </div>
    </div>
</x-layouts.admin-layout>

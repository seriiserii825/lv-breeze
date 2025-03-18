<x-layouts.admin-layout>
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <span>Levels</span>
            <a href="{{ route('admin.course-levels.create') }}" class="btn btn-primary">New Level</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-vcenter card-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($levels as $level)
                            <tr>
                                <td>{{ $level->name }}</td>
                                <td>{{ $level->slug }}</td>
                                <td>
                                    <div class="d-flex gap-4 align-items-center">
                                        <a href="{{ route('admin.course-levels.edit', $level) }}"
                                            class="text-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="{{ route('admin.course-levels.destroy', $level->id) }}" class=" js-show-modal text-danger"><i class="fa-solid fa-trash-can"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">No levels found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layouts.admin-layout>

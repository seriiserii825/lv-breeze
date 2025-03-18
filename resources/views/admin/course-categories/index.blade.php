<x-layouts.admin-layout>
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <span>Categories</span>
            <a href="{{ route('admin.course-categories.create') }}" class="btn btn-primary">New Category</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-vcenter card-table">
                    <thead>
                        <tr>
                            <th>Icon</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Show at tranding</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)
                            <tr>
                                <td>
                                    <span class="{{ $category->icon }}"></span>
                                </td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->slug }}</td>
                                <td>
                                    @if ($category->show_at_tranding)
                                        <span class="text-white badge rounded-pill bg-success">Active</span>
                                    @else
                                        <span class="text-white badge rounded-pill bg-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($category->status)
                                        <span class="text-white badge rounded-pill bg-success">Active</span>
                                    @else
                                        <span class="text-white badge rounded-pill bg-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex gap-4 align-items-center">
                                        <a href="{{ route('admin.course-categories.edit', $category) }}"
                                            class="text-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="{{ route('admin.course-categories.destroy', $category->id) }}" class=" js-show-modal text-danger"><i class="fa-solid fa-trash-can"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">No categories found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-5">
                {{ $categories->links() }}
            </div>
        </div>
    </div>
</x-layouts.admin-layout>

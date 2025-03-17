<x-layouts.admin-layout>
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <span>Languages</span>
            <a href="{{ route('admin.course-languages.create') }}" class="btn btn-primary">New Language</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-vcenter card-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Slug</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($languages as $language)
                            <tr>
                                <td>{{ $language->name }}</td>
                                <td>{{ $language->slug }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">No instructors found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layouts.admin-layout>

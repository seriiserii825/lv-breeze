<x-layouts.admin-layout>
    <div class="card">
        <div class="card-header">
            Featured
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-vcenter card-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Document</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($instructors as $instructor)
                            <tr>
                                <td>{{ $instructor->name }}</td>
                                <td class="text-secondary">{{ $instructor->email }}</td>
                                <td class="text-secondary"><span
                                        class="badge bg-yellow text-yellow-fg ms-2">{{ $instructor->approve_status }}</span>
                                </td>
                                <td>
                                    <a href="{{ $instructor->document }}" target="_blank">View Document</a>
                                </td>
                                <td>
                                    <x-form.select name="approve_status" :options="[
                                        'pending' => 'Pending',
                                        'approved' => 'Approved',
                                        'rejected' => 'Rejected',
                                    ]"
                                        value="{{ $instructor->approve_status }}" />
                                </td>
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

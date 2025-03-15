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
                            <th>Action</th>
                            <th class="w-1"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($instructors as $instructor)
                            <tr>
                                <td>{{ $instructor->name }}</td>
                                <td class="text-secondary">{{ $instructor->email }}</td>
                                <td class="text-secondary"><span class="badge bg-yellow text-yellow-fg ms-2">{{ $instructor->approve_status }}</span></td>
                                <td>
                                    <select class="form-select" wire:change="changeStatus({{ $instructor->id }}, $event.target.value)">
                                        <option value="pending" {{ $instructor->approve_status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="approved" {{ $instructor->approve_status == 'approved' ? 'selected' : '' }}>Approved</option>
                                        <option value="rejected" {{ $instructor->approve_status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                    </select>
                                </td>
                                <td class="text-secondary">User</td>
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

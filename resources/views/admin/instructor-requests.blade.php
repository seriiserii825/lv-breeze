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
                                <td class="text-secondary">
                                    @if ($instructor->approve_status === 'pending')
                                        <span
                                            class="badge bg-yellow text-yellow-fg ms-2">{{ $instructor->approve_status }}</span>
                                    @elseif($instructor->approve_status === 'rejected')
                                        <span
                                            class="badge bg-red text-red-fg ms-2">{{ $instructor->approve_status }}</span>
                                    @else
                                        <span
                                            class="badge bg-green text-green-fg ms-2">{{ $instructor->approve_status }}</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ $instructor->document }}" target="_blank">
                                        <x-icons.i-download fill="#777" />
                                    </a>
                                </td>
                                <td>
                                    <span>id: {{ $instructor->id }}</span>
                                    <form class="js-instructor-update-form"
                                        action="{{ route('admin.instructor-requests.update', $instructor->id) }}"
                                        method="post" accept-charset="utf-8">
                                        @csrf
                                        @method('PUT')
                                        <x-form.select name="approve_status" :options="[
                                            'pending' => 'Pending',
                                            'approved' => 'Approved',
                                            'rejected' => 'Rejected',
                                        ]"
                                            value="{{ $instructor->approve_status }}" />
                                    </form>
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

<script charset="utf-8">
    const select_all = document.querySelectorAll('.js-instructor-update-form select');
    select_all.forEach(select => {
        const form = select.closest('form');
        select.addEventListener('change', function() {
            // console.log(select.value, 'select value');
            form.submit();
        });
    });
</script>

<x-layouts.front-layout>
    <x-utils.breadcrumb title="Student Dashboard" />
    <section class="wsus__dashboard mt_90 xs_mt_70 pb_120 xs_pb_100">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-md-4 wow fadeInLeft">
                    <x-utils.student-sidebar />
                </div>
                <div class="col-xl-9 col-md-8">
                    @if (auth()->user()->approve_status == 'pending')
                        <x-utils.alert type="info"
                            message="{{ 'Hello ' . auth()->user()->name . ' your instructor email is currently pending. We will will send an email when you will be approved after' }}" />
                    @else
                        <div class="flex justify-end">
                            <a href="{{ route('student.become-instructor') }}" class="btn btn-primary">Become
                                instructor</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
</x-layouts.front-layout>

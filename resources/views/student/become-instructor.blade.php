<x-layouts.front-layout>
    <x-utils.breadcrumb title="Become Instructor" />
    <section class="wsus__dashboard mt_90 xs_mt_70 pb_120 xs_pb_100">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-md-4 wow fadeInLeft">
                    <x-utils.student-sidebar />
                </div>
                <div class="col-xl-9 col-md-8">
                    <div class="card">
                        <div class="card-header"> Become Instructor </div>
                        <div class="card-body">
                            <form action="{{ route('student.become-instructor.udpate', auth()->user()->id) }}"
                                method="post" enctype="multipart/form-data">
                                @csrf
                                <x-form.input-file name="document" label="Document" required />
                                <button type="submit" class="btn btn-primary mt-4">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.front-layout>

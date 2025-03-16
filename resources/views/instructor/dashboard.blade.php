<x-layouts.front-layout>
    <x-utils.breadcrumb title="Instructor Dashboard" />
    <section class="wsus__dashboard mt_90 xs_mt_70 pb_120 xs_pb_100">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-md-4 wow fadeInLeft">
                    <x-utils.student-sidebar />
                </div>
                <div class="col-xl-9 col-md-8">
                    <h2>Instructor</h2>
                </div>
            </div>
        </div>
    </section>
</x-layouts.front-layout>
   <script>
       const btn = document.querySelector(".btn-signout");
       btn.addEventListener("click", (e) => {
           e.preventDefault();
           document.getElementById("js-form-logout").submit();
       });
   </script>

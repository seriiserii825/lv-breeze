<x-layouts.front-user-layout title="Student Dashboard">
    <h2>Instructor</h2>
</x-layouts.front-user-layout>
<script>
    const btn = document.querySelector(".btn-signout");
    btn.addEventListener("click", (e) => {
        e.preventDefault();
        document.getElementById("js-form-logout").submit();
    });
</script>

<aside class="navbar navbar-vertical navbar-expand-lg" data-bs-theme="dark">
    <div class="container-fluid">
        <x-utils.admin-navbar-toggler />
        <h1 class="navbar-brand navbar-brand-autodark">
            <a href=".">
                <img src="./static/logo.svg" width="110" height="32" alt="Tabler" class="navbar-brand-image">
            </a>
        </h1>
        <x-utils.admin-navbar-small-menu />
        <div class="collapse navbar-collapse" id="sidebar-menu">
            <ul class="navbar-nav pt-lg-3">
                <x-navigation.admin-sidebar-link route="admin.dashboard" title="Dashboard" icon="fa-solid fa-house" />
                <x-navigation.admin-sidebar-link route="admin.instructor-requests.index" title="Instructor requests"
                    icon="fa-solid fa-user-nurse" />
                <x-navigation.admin-sidebar-link :dropdown="[
                    [
                        'route' => 'admin.course-languages.index',
                        'title' => 'Languages',
                    ],
                ]" title="Courses"
                    icon="fa-solid fa-person-chalkboard" />
            </ul>
        </div>
    </div>
</aside>
<script charset="utf-8">
    const dropdowns = document.querySelectorAll('.nav-item.dropdown');
    const current_url = window.location.href;
    dropdowns.forEach((dropdown) => {
        const dropdown_link = dropdown.querySelector('.nav-link');
        const dropdown_links = dropdown.querySelectorAll('.dropdown-item');
        const dropdown_menu = dropdown.querySelector('.dropdown-menu');
        dropdown_links.forEach((link) => {
            if (link.href === current_url) {
                console.log('true');
                dropdown_link.setAttribute('aria-expanded', 'true');
                dropdown_link.classList.add('dropdown-toggle');
                dropdown_menu.classList.add('show');
            }
        });
    });
</script>

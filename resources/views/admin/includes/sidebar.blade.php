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
                        'route' => 'admin.course-categories.index',
                        'title' => 'Categories',
                    ],
                    [
                        'route' => 'admin.course-languages.index',
                        'title' => 'Languages',
                    ],
                    [
                        'route' => 'admin.course-levels.index',
                        'title' => 'Levels',
                    ]
                ]" title="Courses"
                    icon="fa-solid fa-person-chalkboard" />
            </ul>
        </div>
    </div>
</aside>
<script charset="utf-8">
    const dropdowns = document.querySelectorAll('.nav-item.dropdown');
    const current_url = window.location.href;
    console.log("current_url", current_url);
    dropdowns.forEach((dropdown) => {
        const dropdown_link = dropdown.querySelector('.nav-link');
        const dropdown_links = dropdown.querySelectorAll('.dropdown-item');
        const dropdown_menu = dropdown.querySelector('.dropdown-menu');
        dropdown_links.forEach((link) => {
        console.log("link.href", link.href);
            if (link.href === current_url || current_url.includes(link.href)) {
                dropdown_link.setAttribute('aria-expanded', 'true');
                dropdown_link.classList.add('dropdown-toggle');
                dropdown_menu.classList.add('show');
            }
        });
    });
</script>

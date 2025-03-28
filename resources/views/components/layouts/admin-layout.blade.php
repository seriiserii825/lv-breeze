<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Dashboard</title>

    @notifyCss

    <!-- CSS files -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <link rel="stylesheet" href="sweetalert2.min.css">
    <link href="{{ asset('admin/assets/dist/css/tabler.min.css?1692870487') }}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/dist/css/demo.min.css?1692870487') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }

        .notify {
            align-items: flex-end;
            z-index: 9999;
        }

        .form-check {
            cursor: pointer;
        }
        div:where(.swal2-container) button:where(.swal2-styled):where(.swal2-confirm) {
            background-color: #dc3545 !important;
            border-color: #dc3545 !important;
        }
        div:where(.swal2-container) button:where(.swal2-styled):where(.swal2-cancel) {
            background-color: #0d6efd !important;
            border-color: #0d6efd !important;
        }
    </style>
    @vite(['resources/js/app.js'])
</head>
<body>
    <script src="{{ asset('admin/assets/dist/js/demo-theme.min.js?1692870487') }}"></script>
    <div class="page">
        @include('admin.includes.sidebar')
        @include('admin.includes.header')
        <div class="page-wrapper">
            <div class="page-body">
                <div class="container-fluid">
                    @if (session('success'))
                        <x-utils.alert type="success" message="{{ session('success') }}" />
                    @endif
                    @if (session('error'))
                        <x-utils.alert type="error" message="{{ session('error') }}" />
                    @endif

                    {{ $slot }}
                </div>
            </div>
            @include('admin.includes.footer')
        </div>
    </div>
    <!-- <x-modal.modal /> -->
    <x-notify::notify />
    @notifyJs
    <!-- Tabler Core -->
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
    <script src="{{ asset('admin/assets/dist/js/tabler.min.js?1692870487') }}" defer></script>
    <script src="{{ asset('admin/assets/dist/js/demo.min.js?1692870487') }}" defer></script>
</body>
</html>

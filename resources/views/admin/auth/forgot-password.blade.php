{{-- <x-guest-layout> --}}
{{--     <div class="mb-4 text-sm text-gray-600"> --}}
{{--         {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }} --}}
{{--     </div> --}}
{{--  --}}
{{--     <!-- Session Status --> --}}
{{--     <x-auth-session-status class="mb-4" :status="session('status')" /> --}}
{{--  --}}
{{--     <form method="POST" action="{{ route('admin.password.email') }}"> --}}
{{--         @csrf --}}
{{--  --}}
{{--         <!-- Email Address --> --}}
{{--         <div> --}}
{{--             <x-input-label for="email" :value="__('Email')" /> --}}
{{--             <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required autofocus /> --}}
{{--             <x-input-error :messages="$errors->get('email')" class="mt-2" /> --}}
{{--         </div> --}}
{{--  --}}
{{--         <div class="flex items-center justify-end mt-4"> --}}
{{--             <x-primary-button> --}}
{{--                 {{ __('Email Password Reset Link') }} --}}
{{--             </x-primary-button> --}}
{{--         </div> --}}
{{--     </form> --}}
{{-- </x-guest-layout> --}}



<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Sign in - Tabler - Premium and Open Source dashboard template with responsive and high quality UI.</title>
    <!-- CSS files -->
    <link href="{{ asset('admin/assets/dist/css/tabler.min.css?1692870487') }}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/dist/css/tabler-flags.min.css?1692870487') }}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/dist/css/tabler-payments.min.css?1692870487') }}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/dist/css/tabler-vendors.min.css?1692870487') }}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/dist/css/demo.min.css?1692870487') }}" rel="stylesheet" />
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
</head>
<body class=" d-flex flex-column">
    <script src="./dist/js/demo-theme.min.js?1692870487"></script>
    <div class="page page-center">
        <div class="container py-4 container-tight">
            <x-auth-session-status class="mb-4" :status="session('status')" />
            <div class="card card-md">
                <div class="card-body">
                    <p class="text-sm">Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>
                    <form action="{{ route('admin.password.email') }}" method="POST" autocomplete="off" novalidate>
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control" :value="old('email')" required
                                placeholder="your@email.com" autocomplete="off">
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary w-100">Email Password Reset Link</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="{{ asset('admin/assets/dist/js/tabler.min.js?1692870487') }}" defer></script>
    <script src="{{ asset('admin/assets/dist/js/demo.min.js?1692870487') }}" defer></script>
</body>
</html>

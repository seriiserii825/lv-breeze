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
            <div class="card card-md">
                <div class="card-body">
                    <h2 class="mb-4 text-center h2">Login to your account</h2>
                    <form action="{{ route('admin.login.store') }}" method="POST" autocomplete="off" novalidate>
                        @csrf
                        <div class="mb-3">
                            <x-email-component name="email" label="Email" placeholder="Your email" required="true"
                                error_name="email" />
                        </div>
                        <div class="mb-2">
                            <x-password-component name="password" label="Password" placeholder="Your password" required="true"
                                error_name="password" />
                        </div>
                        <label class="form-label">
                            <span class="form-label-description">
                                <a href="{{ route('admin.password.request') }}">I forgot password</a>
                            </span>
                        </label>
                        <div class="mb-2">
                            <label class="form-check">
                                <input type="checkbox" class="form-check-input" />
                                <span class="form-check-label">Remember me on this device</span>
                            </label>
                        </div>
                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary w-100">Sign in</button>
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

{{-- <x-guest-layout> --}}
{{--     <!-- Session Status --> --}}
{{--     <x-auth-session-status class="mb-4" :status="session('status')" /> --}}
{{--  --}}
{{--     <form method="POST" action="{{ route('admin.login.store') }}"> --}}
{{--         @csrf --}}
{{--  --}}
{{--         <!-- Email Address --> --}}
{{--         <div> --}}
{{--             <h3 class="font-bold text-blue-500">Admin</h3> --}}
{{--             <x-input-label for="email" :value="__('Email')" /> --}}
{{--             <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required --}}
{{--                 autofocus autocomplete="username" /> --}}
{{--             <x-input-error :messages="$errors->get('email')" class="mt-2" /> --}}
{{--         </div> --}}
{{--  --}}
{{--         <!-- Password --> --}}
{{--         <div class="mt-4"> --}}
{{--             <x-input-label for="password" :value="__('Password')" /> --}}
{{--  --}}
{{--             <x-text-input id="password" class="block w-full mt-1" type="password" name="password" required --}}
{{--                 autocomplete="current-password" /> --}}
{{--  --}}
{{--             <x-input-error :messages="$errors->get('password')" class="mt-2" /> --}}
{{--         </div> --}}
{{--  --}}
{{--         <!-- Remember Me --> --}}
{{--         <div class="block mt-4"> --}}
{{--             <label for="remember_me" class="inline-flex items-center"> --}}
{{--                 <input id="remember_me" type="checkbox" --}}
{{--                     class="text-indigo-600 border-gray-300 rounded shadow-sm focus:ring-indigo-500" name="remember"> --}}
{{--                 <span class="text-sm text-gray-600 ms-2">{{ __('Remember me') }}</span> --}}
{{--             </label> --}}
{{--         </div> --}}
{{--  --}}
{{--         <div class="flex items-center justify-end mt-4"> --}}
{{--             @if (Route::has('password.request')) --}}
{{--                 <a class="text-sm text-gray-600 underline hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" --}}
{{--                     href="{{ route('admin.password.request') }}"> --}}
{{--                     {{ __('Forgot your password?') }} --}}
{{--                 </a> --}}
{{--             @endif --}}
{{--  --}}
{{--             <x-primary-button class="ms-3"> --}}
{{--                 {{ __('Log in') }} --}}
{{--             </x-primary-button> --}}
{{--         </div> --}}
{{--     </form> --}}
{{-- </x-guest-layout> --}}
